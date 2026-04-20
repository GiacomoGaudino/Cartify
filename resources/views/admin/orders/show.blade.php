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

                @include('profile.partials.orderStatus', ['order' => $order])

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

        <!-- UPDATE STATUS -->
        <div class="bg-white rounded-3xl shadow p-6">

            <h2 class="text-xl font-bold text-gray-900 mb-4">
                Update Order Status
            </h2>

            <form method="POST" action="{{ route('admin.orders.update.status', $order) }}">
                @csrf
                @method('PATCH')

                <div class="flex flex-col sm:flex-row gap-4">

                    <select name="status"
                        class="w-full sm:w-auto flex-1 rounded-2xl border border-gray-200 px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary">

                        <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="paid" {{ $order->status === 'paid' ? 'selected' : '' }}>
                            Paid
                        </option>

                        <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>
                            Shipped
                        </option>

                        <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>
                            Completed
                        </option>

                        <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>
                            Cancelled
                        </option>

                    </select>

                    <button type="submit"
                        class="bg-primary text-white px-6 py-3 rounded-2xl font-medium hover:bg-primary-hover transition">
                        Update Status
                    </button>

                </div>

            </form>

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