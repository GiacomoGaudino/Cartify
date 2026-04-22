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

            <!-- TITLE + FILTERS -->
            <div class="p-6 border-b space-y-4">

                <h2 class="text-xl font-bold text-gray-900">
                    All Orders
                </h2>

                <!-- SEARCH -->
                <form action="{{ route('admin.orders.index') }}" method="GET">
                    <div class="flex flex-col md:flex-row gap-3">

                        <input type="text" name="search" placeholder="Search by customer name or email..."
                            class="w-full md:flex-1 px-4 py-3 rounded-2xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary">

                        <button type="submit"
                            class="px-6 py-3 rounded-2xl bg-primary text-white font-medium hover:bg-primary-hover transition">
                            Search
                        </button>

                    </div>
                </form>

                <!-- FILTER BUTTONS -->
                <div class="flex flex-wrap gap-3">

                    <a href="{{ route('admin.orders.index') }}" class="px-4 py-2 rounded-2xl text-sm font-medium transition
                           {{ request('status') === null
        ? 'bg-primary text-white hover:bg-primary-hover'
        : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        All
                    </a>

                    <a href="{{ route('admin.orders.index', ['status' => 'pending']) }}" class="px-4 py-2 rounded-2xl text-sm font-medium transition
                           {{ request('status') === 'pending'
        ? 'bg-primary text-white hover:bg-primary-hover'
        : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        Pending
                    </a>

                    <a href="{{ route('admin.orders.index', ['status' => 'paid']) }}" class="px-4 py-2 rounded-2xl text-sm font-medium transition
                           {{ request('status') === 'paid'
        ? 'bg-primary text-white hover:bg-primary-hover'
        : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        Paid
                    </a>

                    <a href="{{ route('admin.orders.index', ['status' => 'shipped']) }}" class="px-4 py-2 rounded-2xl text-sm font-medium transition
                           {{ request('status') === 'shipped'
        ? 'bg-primary text-white hover:bg-primary-hover'
        : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        Shipped
                    </a>

                    <a href="{{ route('admin.orders.index', ['status' => 'completed']) }}" class="px-4 py-2 rounded-2xl text-sm font-medium transition
                           {{ request('status') === 'completed'
        ? 'bg-primary text-white hover:bg-primary-hover'
        : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        Completed
                    </a>

                    <a href="{{ route('admin.orders.index', ['status' => 'cancelled']) }}" class="px-4 py-2 rounded-2xl text-sm font-medium transition
                           {{ request('status') === 'cancelled'
        ? 'bg-primary text-white hover:bg-primary-hover'
        : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        Cancelled
                    </a>

                </div>

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
                                        <a href="{{ route('admin.orders.show', $order) }}"
                                            class="font-medium text-gray-900 hover:text-primary transition">
                                            #{{ $order->id }}
                                        </a>
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
                                        @include('profile.partials.orderStatus', ['order' => $order])
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
                    {{ $orders->withQueryString()->links() }}
                </div>

            @else

                <div class="p-8 text-center text-gray-500">
                    No orders found.
                </div>

            @endif

        </div>

    </div>

@endsection