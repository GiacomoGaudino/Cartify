<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout.index');
    }

    public function store(Request $request)
    {
        // VALIDAZIONE
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'address' => ['required', 'string', 'max:500'],
        ]);

        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Il carrello è vuoto.');
        }

        // CREAZIONE ORDINE
        $order = DB::transaction(function () use ($validated, $cart) {

            $total = collect($cart)->sum(function ($item) {
                return $item['price'] * $item['quantity'];
            });

            $order = Order::create([
                'user_id' => auth()->id(),
                'customer_name' => $validated['name'],
                'customer_email' => $validated['email'],
                'shipping_address' => $validated['address'],
                'total' => $total,
                'status' => 'pending',
            ]);

            foreach ($cart as $id => $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['price'],
                    'subtotal' => $item['price'] * $item['quantity'],
                ]);
            }

            return $order;
        });

        // STRIPE
        Stripe::setApiKey(config('services.stripe.secret'));

        $lineItems = [];

        foreach ($cart as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $item['name'],
                    ],
                    'unit_amount' => (int) round($item['price'] * 100),
                ],
                'quantity' => $item['quantity'],
            ];
        }

        $session = Session::create([
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            'line_items' => $lineItems,
            'success_url' => route('checkout.success', ['order' => $order->id], true),
            'cancel_url' => route('cart.index', [], true),
        ]);

        return redirect($session->url);
    }

    public function success(Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        $order->load('items.product');

        // Evita doppio update
        if ($order->status !== 'paid') {
            $order->update([
                'status' => 'paid'
            ]);
        }

        // Svuota carrello solo dopo pagamento
        session()->forget('cart');

        return view('checkout.success', compact('order'));
    }
}
