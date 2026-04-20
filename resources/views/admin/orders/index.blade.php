@extends('layouts.master')

@section('hideHero', true)

@section('content')

    <div class="max-w-7xl mx-auto space-y-8">

        <!-- HEADER -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

            <div>

                <a href="{{ route('admin.dashboard') }}"
                    class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-primary transition mb-3">
                    ← Back to Dashboard
                </a>

                <h1 class="text-3xl font-bold text-gray-900">
                    Orders Management
                </h1>

                <p class="text-gray-500 mt-2">
                    View and manage all customer orders.
                </p>

            </div>

        </div>

        <!-- TABLE -->
        <div class="bg-white rounded-3xl shadow overflow-hidden">

            <div class="p-6 border-b">
                <h2 class="text-xl font-bold text-gray-900">
                    All Orders
                </h2>
            </div>

            @if($orders->count())

                <div class="overflow-x-auto">

                    <table class="w-full text-sm">

                        <thead class="bg-gray-50 text-gray-500 uppercase tracking-wide">
                            <tr>
                                <th class="text-left px-6 py-4">Order</th>
                                <th class="text-left px-6 py-4">Customer</th>
                                <th class="text-left px-6 py-4">Items</th>
                                <th class="text-left px-6 py-4">Total</th>
                                <th class="text-left px-6 py-4">Status</th>
                                <th class="text-left px-6 py-4">Date</th>
                                <th class="text-left px-6 py-4">Action</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">

                            @foreach($orders as $order)

                                <tr class="hover:bg-gray-50 transition">

                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        #{{ $order->id }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="font-medium text-gray-900">
                                            {{ $order->customer_name }}
                                        </div>

                                        <div class="text-gray-500 text-xs">
                                            {{ $order->customer_email }}
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 text-gray-700">
                                        {{ $order->items_count }}
                                    </td>

                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        € {{ number_format($order->total, 2) }}
                                    </td>

                                    <td class="px-6 py-4">

                                        @if($order->status === 'pending')
                                            <span class="bg-orange-100 text-orange-600 px-3 py-1 rounded-full text-xs font-medium">
                                                Pending
                                            </span>

                                        @elseif($order->status === 'paid')
                                            <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs font-medium">
                                                Paid
                                            </span>

                                        @elseif($order->status === 'shipped')
                                            <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs font-medium">
                                                Shipped
                                            </span>

                                        @else
                                            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-medium">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        @endif

                                    </td>

                                    <td class="px-6 py-4 text-gray-500">
                                        {{ $order->created_at->format('d/m/Y') }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <a href="{{ route('admin.orders.show', $order) }}"
                                            class="text-primary font-medium hover:underline">
                                            View
                                        </a>
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

                <div class="p-6 border-t">
                    {{ $orders->links() }}
                </div>

            @else

                <div class="p-8 text-center text-gray-500">
                    No orders found.
                </div>

            @endif

        </div>

    </div>

@endsection