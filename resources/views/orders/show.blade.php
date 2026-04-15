@extends('layouts.master')

@section('hideHero', true)

@section('content')

    <div class="max-w-4xl mx-auto space-y-8">

        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Ordine #{{ $order->id }}</h1>
                <p class="text-gray-500 mt-2">
                    Effettuato il {{ $order->created_at->format('d/m/Y H:i') }}
                </p>
            </div>

            <a href="{{ route('orders.index') }}" class="text-primary font-medium hover:text-primary-hover transition">
                ← Torna ai miei ordini
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <p class="text-sm text-gray-500">Cliente</p>
                    <p class="font-semibold text-gray-900 mt-1">{{ $order->customer_name }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Email</p>
                    <p class="font-semibold text-gray-900 mt-1">{{ $order->customer_email }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Stato</p>
                    <span class="inline-flex mt-1 rounded-full bg-yellow-100 px-3 py-1 text-xs font-medium text-yellow-800">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
            </div>

            <div class="mt-6">
                <p class="text-sm text-gray-500">Indirizzo di spedizione</p>
                <p class="font-semibold text-gray-900 mt-1">{{ $order->shipping_address }}</p>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Prodotti ordinati</h2>

            <div class="space-y-4">
                @foreach($order->items as $item)
                    <div class="flex items-center justify-between border-b border-gray-100 pb-4">
                        <div>
                            <p class="font-semibold text-gray-900">
                                {{ $item->product->name ?? 'Prodotto non disponibile' }}
                            </p>
                            <p class="text-sm text-gray-500 mt-1">
                                Quantità: {{ $item->quantity }}
                            </p>
                            <p class="text-sm text-gray-500">
                                Prezzo unitario: € {{ number_format($item->unit_price, 2) }}
                            </p>
                        </div>

                        <div class="text-right">
                            <p class="text-sm text-gray-500">Subtotale</p>
                            <p class="font-semibold text-gray-900">
                                € {{ number_format($item->subtotal, 2) }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 pt-6 border-t border-gray-200 flex items-center justify-between">
                <span class="text-lg font-semibold text-gray-700">Totale</span>
                <span class="text-2xl font-bold text-gray-900">
                    € {{ number_format($order->total, 2) }}
                </span>
            </div>
        </div>

    </div>

@endsection