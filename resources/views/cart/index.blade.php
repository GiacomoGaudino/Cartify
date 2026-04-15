@extends('layouts.master')

@section('hideHero', true)

@section('content')

<div class="max-w-5xl mx-auto space-y-8">

    <div>
        <h1 class="text-3xl font-bold text-gray-900">
            Il tuo carrello
        </h1>
        <p class="text-gray-500 mt-2">
            Controlla i prodotti prima di procedere al checkout
        </p>
    </div>

    @if(empty($cart))
        <div class="bg-white rounded-3xl shadow p-8 text-center">
            <p class="text-gray-500">
                Il carrello è vuoto
            </p>

            <a href="{{ route('products.index') }}"
               class="inline-block mt-4 bg-primary text-white px-6 py-3 rounded-2xl hover:bg-primary-hover transition">
                Scopri i prodotti
            </a>
        </div>
    @else

        @php $total = 0; @endphp

        <div class="space-y-4">

            @foreach($cart as $id => $item)

                @php
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
                @endphp

                <div class="bg-white rounded-3xl shadow p-5 flex items-center gap-6">

                    <!-- IMAGE -->
                    <div class="w-24 h-24 flex-shrink-0">
                        @if(isset($item['image']))
                            <img src="{{ asset('storage/' . $item['image']) }}"
                                 class="w-full h-full object-cover rounded-xl">
                        @else
                            <div class="w-full h-full bg-gray-100 rounded-xl flex items-center justify-center text-gray-400 text-xs">
                                No image
                            </div>
                        @endif
                    </div>

                    <!-- INFO -->
                    <div class="flex-grow">

                        <h2 class="font-semibold text-gray-900">
                            {{ $item['name'] }}
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            € {{ number_format($item['price'], 2) }}
                        </p>

                        <!-- QUANTITY -->
                        <form method="POST" action="{{ route('cart.update', $id) }}" class="mt-3 flex items-center gap-2">
                            @csrf
                            @method('PATCH')

                            <input type="number"
                                   name="quantity"
                                   value="{{ $item['quantity'] }}"
                                   min="1"
                                   class="w-16 border border-gray-200 rounded-lg px-2 py-1 text-center">

                            <button class="text-sm text-blue-600 hover:underline">
                                Aggiorna
                            </button>
                        </form>

                    </div>

                    <!-- PRICE + REMOVE -->
                    <div class="text-right space-y-2">

                        <p class="font-bold text-gray-900">
                            € {{ number_format($subtotal, 2) }}
                        </p>

                        <form method="POST" action="{{ route('cart.remove', $id) }}">
                            @csrf
                            @method('DELETE')

                            <button class="text-sm text-red-500 hover:underline">
                                Rimuovi
                            </button>
                        </form>

                    </div>

                </div>

            @endforeach

        </div>

        <!-- TOTAL + CHECKOUT -->
        <div class="bg-white rounded-3xl shadow p-6 flex items-center justify-between">

            <div>
                <p class="text-gray-500 text-sm">
                    Totale
                </p>
                <p class="text-2xl font-bold text-gray-900">
                    € {{ number_format($total, 2) }}
                </p>
            </div>

            <a href="{{ route('checkout.index') }}"
               class="bg-primary text-white px-8 py-3 rounded-2xl hover:bg-primary-hover transition font-medium">
                Vai al checkout
            </a>

        </div>

    @endif

</div>

@endsection