@extends('layouts.master')

@section('hideHero', true)

@section('content')

    <div class="max-w-7xl mx-auto space-y-10">

        <!-- HEADER -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

            <div>
                <h1 class="text-3xl font-bold text-gray-900">
                    Admin Dashboard
                </h1>

                <p class="text-gray-500 mt-2">
                    Overview of products, orders, users, and revenue.
                </p>
            </div>

            <div class="flex flex-wrap gap-3">

                <a href="{{ route('admin.products.index') }}"
                    class="bg-primary text-white px-5 py-3 rounded-2xl font-medium hover:bg-primary-hover transition">
                    Manage Products
                </a>

                <a href="{{ route('admin.orders.index') }}"
                    class="bg-primary border border-gray-200 text-white px-5 py-3 rounded-2xl font-medium hover:bg-primary-hover transition">
                    Manage Orders
                </a>

            </div>

        </div>

        <!-- KPI CARDS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-5 gap-6">

            <!-- Total Orders -->
            <div class="bg-white rounded-3xl shadow p-6">
                <p class="text-sm text-gray-500">
                    Total Orders
                </p>

                <p class="text-3xl font-bold text-gray-900 mt-2">
                    {{ $totalOrders }}
                </p>
            </div>

            <!-- Pending Orders -->
            <div class="bg-white rounded-3xl shadow p-6">
                <p class="text-sm text-gray-500">
                    Pending Orders
                </p>

                <p class="text-3xl font-bold text-orange-500 mt-2">
                    {{ $pendingOrders }}
                </p>
            </div>

            <!-- Revenue -->
            <div class="bg-white rounded-3xl shadow p-6">
                <p class="text-sm text-gray-500">
                    Revenue
                </p>

                <p class="text-3xl font-bold text-green-600 mt-2">
                    € {{ number_format($totalRevenue, 2) }}
                </p>
            </div>

            <!-- Products -->
            <div class="bg-white rounded-3xl shadow p-6">
                <p class="text-sm text-gray-500">
                    Products
                </p>

                <p class="text-3xl font-bold text-gray-900 mt-2">
                    {{ $totalProducts }}
                </p>
            </div>

            <!-- Users -->
            <div class="bg-white rounded-3xl shadow p-6">
                <p class="text-sm text-gray-500">
                    Users
                </p>

                <p class="text-3xl font-bold text-gray-900 mt-2">
                    {{ $totalUsers }}
                </p>
            </div>

        </div>

        <!-- RECENT ORDERS -->
        <div class="bg-white rounded-3xl shadow overflow-hidden">

            <div class="p-6 border-b flex items-center justify-between">

                <h2 class="text-xl font-bold text-gray-900">
                    Latest Orders
                </h2>

            </div>

            @if($latestOrders->count())

                <div class="overflow-x-auto">

                    <table class="w-full text-sm">

                        <thead class="bg-gray-50 text-gray-500 uppercase tracking-wide">
                            <tr>
                                <th class="text-left px-6 py-4">Order</th>
                                <th class="text-left px-6 py-4">Customer</th>
                                <th class="text-left px-6 py-4">Total</th>
                                <th class="text-left px-6 py-4">Status</th>
                                <th class="text-left px-6 py-4">Date</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">

                            @foreach($latestOrders as $order)

                                <tr class="hover:bg-gray-50 transition">

                                    <td class="px-6 py-4 font-medium">
                                        <a href="{{ route('admin.orders.show', $order) }}"
                                            class="text-gray-900 hover:text-primary transition">
                                            #{{ $order->id }}
                                        </a>
                                    </td>

                                    <td class="px-6 py-4 text-gray-700">
                                        {{ $order->customer_name }}
                                    </td>

                                    <td class="px-6 py-4 text-gray-700">
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

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="p-8 text-center text-gray-500">
                    No orders yet.
                </div>

            @endif

        </div>

    </div>

@endsection