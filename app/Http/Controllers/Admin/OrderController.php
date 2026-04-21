<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::withCount('items');
        if (request()->query('status')) {
            $orders = Order::withCount('items')->where('status', request()->query('status'))->latest()->paginate(10);
        } else {
            $orders = Order::withCount('items')->latest()->paginate(10);
        }  
        return view("admin.orders.index", compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('items.product');
        return view("admin.orders.show", compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,paid,shipped,completed,cancelled'],
        ]);

        $order->update($validated);

        return redirect()->route('admin.orders.show', $order)
            ->with('success', 'Order status updated');
    }
}