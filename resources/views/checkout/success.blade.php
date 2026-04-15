@extends('layouts.master')

@section('content')

    <div class="max-w-3xl mx-auto py-10">

        <h1 class="text-2xl font-bold mb-4">
            🎉 Order placed successfully!
        </h1>

        <p class="mb-6">
            Order ID: <strong>#{{ $order->id }}</strong>
        </p>

        <p class="mb-6">
            Total: <strong>€{{ number_format($order->total, 2) }}</strong>
        </p>

        <h2 class="text-xl font-semibold mb-4">Order Details</h2>

        <div class="space-y-4">
            @foreach($order->items as $item)
                <div class="border p-4 rounded">
                    <h3 class="font-semibold">
                        {{ $item->product->name }}
                    </h3>

                    <p>Quantity: {{ $item->quantity }}</p>
                    <p>Price: €{{ number_format($item->unit_price, 2) }}</p>
                    <p>Subtotal: €{{ number_format($item->subtotal, 2) }}</p>
                </div>
            @endforeach
        </div>

        <a href="{{ route('products.index') }}" class="inline-block mt-6 bg-black text-white px-6 py-3 rounded">
            Continue shopping
        </a>

    </div>

@endsection