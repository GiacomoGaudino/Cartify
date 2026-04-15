@extends('layouts.master')

@section('hideHero', true)

@section('content')
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                <div class="px-8 py-10 border-b border-gray-100 text-center">
                    <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-green-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>

                    <h1 class="text-3xl font-bold text-gray-900">Order placed successfully</h1>
                    <p class="mt-3 text-gray-600">
                        Thank you for your purchase. Your order has been received and is now being processed.
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 px-8 py-10">

                    <div class="lg:col-span-2">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-semibold text-gray-900">Order summary</h2>
                            <span class="text-sm text-gray-500">Order #{{ $order->id }}</span>
                        </div>

                        <div class="space-y-4">
                            @foreach($order->items as $item)
                                <div class="flex items-center gap-4 rounded-xl border border-gray-100 bg-gray-50 p-4">

                                    <div
                                        class="h-20 w-20 flex-shrink-0 overflow-hidden rounded-lg bg-white border border-gray-200">
                                        @if($item->product && $item->product->image)
                                            <img src="{{ asset('storage/' . $item->product->image) }}"
                                                alt="{{ $item->product->name }}" class="h-full w-full object-cover">
                                        @else
                                            <div class="flex h-full w-full items-center justify-center text-xs text-gray-400">
                                                No image
                                            </div>
                                        @endif
                                    </div>

                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-base font-semibold text-gray-900 truncate">
                                            {{ $item->product->name ?? 'Product unavailable' }}
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500">
                                            Quantity: {{ $item->quantity }}
                                        </p>
                                        <p class="text-sm text-gray-500">
                                            Unit price: €{{ number_format($item->unit_price, 2) }}
                                        </p>
                                    </div>

                                    <div class="text-right">
                                        <p class="text-sm text-gray-500">Subtotal</p>
                                        <p class="text-base font-semibold text-gray-900">
                                            €{{ number_format($item->subtotal, 2) }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <div class="rounded-2xl border border-gray-100 bg-gray-50 p-6">
                            <h2 class="text-lg font-semibold text-gray-900 mb-5">Order details</h2>

                            <div class="space-y-4 text-sm">
                                <div>
                                    <p class="text-gray-500">Customer</p>
                                    <p class="font-medium text-gray-900">{{ $order->customer_name }}</p>
                                </div>

                                <div>
                                    <p class="text-gray-500">Email</p>
                                    <p class="font-medium text-gray-900 break-all">{{ $order->customer_email }}</p>
                                </div>

                                <div>
                                    <p class="text-gray-500">Shipping address</p>
                                    <p class="font-medium text-gray-900">{{ $order->shipping_address }}</p>
                                </div>

                                <div>
                                    <p class="text-gray-500">Status</p>
                                    <span
                                        class="inline-flex rounded-full bg-yellow-100 px-3 py-1 text-xs font-medium text-yellow-800">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </div>
                            </div>

                            <div class="mt-6 border-t border-gray-200 pt-5">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Total</span>
                                    <span class="text-2xl font-bold text-gray-900">
                                        €{{ number_format($order->total, 2) }}
                                    </span>
                                </div>
                            </div>

                            <div class="mt-6 space-y-3">
                                <a href="{{ route('products.index') }}"
                                    class="block w-full rounded-xl bg-gray-900 px-5 py-3 text-center text-sm font-medium text-white transition hover:bg-gray-800">
                                    Continue shopping
                                </a>

                                <a href="{{ url('/') }}"
                                    class="block w-full rounded-xl border border-gray-300 bg-white px-5 py-3 text-center text-sm font-medium text-gray-700 transition hover:bg-gray-50">
                                    Back to homepage
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection