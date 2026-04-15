@extends('layouts.master')

@section('content')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

        <!-- IMMAGINE -->
        <div class="bg-gray-100 rounded-2xl h-80 flex items-center justify-center text-gray-400">
            Immagine prodotto
        </div>

        <!-- INFO PRODOTTO -->
        <div>

            <h1 class="text-3xl font-bold">
                {{ $product->name }}
            </h1>

            <p class="text-gray-500 mt-4">
                {{ $product->description }}
            </p>

            <div class="mt-6 text-3xl font-bold text-blue-600">
                € {{ $product->price }}
            </div>

            <!-- AZIONI -->
            <div class="mt-8 flex gap-4">

                <a href="/cart/add/{{ $product->id }}"
                    class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition">
                    Aggiungi al carrello
                </a>

                <a href="/products" class="bg-gray-200 text-gray-700 px-6 py-3 rounded-xl hover:bg-gray-300 transition">
                    Torna indietro
                </a>

            </div>

        </div>

    </div>

    <!-- SEZIONE EXTRA (UPGRADE UX) -->
    <div class="mt-16">

        <h2 class="text-xl font-bold mb-4">Descrizione dettagliata</h2>

        <div class="bg-white p-6 rounded-2xl shadow text-gray-600 leading-relaxed">
            {{ $product->description }}
        </div>

    </div>

@endsection