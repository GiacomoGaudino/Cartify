@extends('layouts.master')

@section('hideHero', true)

@section('content')

    <div class="max-w-4xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">I miei ordini</h1>
            <p class="text-gray-500 mt-2">Qui puoi consultare tutti i tuoi ordini.</p>
        </div>

        @if($orders->isEmpty())
            <div class="bg-white rounded-3xl shadow p-8 text-center">
                <h2 class="text-xl font-semibold text-gray-900">Nessun ordine trovato</h2>
                <p class="text-gray-500 mt-2">Non hai ancora effettuato ordini.</p>

                <a href="{{ route('products.index') }}"
                    class="inline-block mt-6 bg-primary text-white px-6 py-3 rounded-2xl hover:bg-primary-hover transition">
                    Scopri i prodotti
                </a>
            </div>
        @else
            <div class="space-y-4">
                @foreach($orders as $order)
                    <div class="bg-white rounded-3xl shadow p-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Ordine #{{ $order->id }}</p>
                            <p class="text-lg font-semibold text-gray-900 mt-1">
                                € {{ number_format($order->total, 2) }}
                            </p>
                            <p class="text-sm text-gray-500 mt-1">
                                {{ $order->created_at->format('d/m/Y H:i') }}
                            </p>
                        </div>

                        <div class="flex items-center gap-3">
                            <span class="inline-flex rounded-full bg-yellow-100 px-3 py-1 text-xs font-medium text-yellow-800">
                                {{ ucfirst($order->status) }}
                            </span>

                            <a href="{{ route('orders.show', $order) }}"
                                class="bg-primary text-white px-4 py-2 rounded-2xl hover:bg-primary-hover transition text-sm font-medium">
                                Dettagli
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

@endsection