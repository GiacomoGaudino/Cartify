@extends('layouts.master')

@section('hideHero', true)

@section('content')

    <div class="max-w-7xl mx-auto space-y-8">

        <!-- HEADER -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

            <div>

                <a href="{{ route('admin.orders.index') }}"
                    class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-primary transition mb-3">
                    ← Back to Orders
                </a>

                <h1 class="text-3xl font-bold text-gray-900">
                    Order #{{ $order->id }}
                </h1>

                <p class="text-gray-500 mt-2">
                    Placed on {{ $order->created_at->format('d/m/Y') }}
                </p>

            </div>

            <div>

                @if($order->status === 'pending')
                    <span class="bg-orange-100 text-orange-600 px-4 py-2 rounded-full text-sm font-medium">
                        Pending
                    </span>

                @elseif($order->status === 'paid')
                    <span class="bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm font-medium">
                        Paid
                    </span>

                @elseif($order->status === 'shipped')
                    <span class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-sm font-medium">
                        Shipped
                    </span>

                @else
                    <span class="bg-gray-100 text-gray-600 px-4 py-2 rounded-full text-sm font-medium">
                        {{ ucfirst($order->status) }}
                    </span>
                @endif

            </div>

        </div>

        <!-- INFO CARDS -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <!-- CUSTOMER DETAILS -->
            <div class="bg-white rounded-3xl shadow p-6">

                <h2 class="text-xl font-bold text-gray-900 mb-4">
                    Customer Details
                </h2>

                <div class="space-y-4 text-sm">

                    <div>
                        <p class="text-gray-500">Name</p>
                        <p class="font-medium text-gray-900">
                            {{ $order->customer_name }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500">Email</p>
                        <p class="font-medium text-gray-900">
                            {{ $order->customer_email }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500">Shipping Address</p>
                        <p class="font-medium text-gray-900">
                            {{ $order->shipping_address }}
                        </p>
                    </div>

                </div>

            </div>

            <!-- ORDER SUMMARY -->
            <div class="bg-white rounded-3xl shadow p-6">

                <h2 class="text-xl font-bold text-gray-900 mb-4">
                    Order Summary
                </h2>

                <div class="space-y-4 text-sm">

                    <div class="flex justify-between">
                        <span class="text-gray-500">Order ID</span>
                        <span class="font-medium text-gray-900">
                            #{{ $order->id }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">Items</span>
                        <span class="font-medium text-gray-900">
                            {{ $order->items->count() }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">Status</span>
                        <span class="font-medium text-gray-900">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>

                    <div class="border-t pt-4 flex justify-between text-base">

                        <span class="font-semibold text-gray-900">
                            Total
                        </span>

                        <span class="font-bold text-primary">
                            € {{ number_format($order->total, 2) }}
                        </span>

                    </div>

                </div>

            </div>

        </div>

        <!-- PRODUCTS TABLE -->
        <div class="bg-white rounded-3xl shadow overflow-hidden">

            <div class="p-6 border-b">
                <h2 class="text-xl font-bold text-gray-900">
                    Purchased Products
                </h2>
            </div>

            <div class="overflow-x-auto">

                <table class="w-full text-sm">

                    <thead class="bg-gray-50 text-gray-500 uppercase tracking-wide">
                        <tr>
                            <th class="text-left px-6 py-4">Product</th>
                            <th class="text-left px-6 py-4">Qty</th>
                            <th class="text-left px-6 py-4">Unit Price</th>
                            <th class="text-left px-6 py-4">Subtotal</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @foreach($order->items as $item)

                            <tr class="hover:bg-gray-50 transition">

                                <td class="px-6 py-4 font-medium text-gray-900">
                                    {{ $item->product->name }}
                                </td>

                                <td class="px-6 py-4 text-gray-700">
                                    {{ $item->quantity }}
                                </td>

                                <td class="px-6 py-4 text-gray-700">
                                    € {{ number_format($item->unit_price, 2) }}
                                </td>

                                <td class="px-6 py-4 font-medium text-gray-900">
                                    € {{ number_format($item->subtotal, 2) }}
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection