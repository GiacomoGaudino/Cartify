@extends('layouts.master')

@section('hideHero', true)

@section('content')

    <div class="max-w-5xl mx-auto">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Gestione prodotti</h1>

            <a href="{{ route('admin.products.create') }}" class="bg-primary text-white px-4 py-2 rounded-xl">
                Nuovo prodotto
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow p-6">

            @foreach($products as $product)
                <div class="flex justify-between items-center border-b py-4">

                    <div>
                        <p class="font-semibold">{{ $product->name }}</p>
                        <p class="text-sm text-gray-500">€ {{ $product->price }}</p>
                    </div>

                    <div class="flex gap-3">
                        <a href="{{ route('admin.products.edit', $product) }}"
                            class="text-primary hover:text-primary-hover transition">Modifica</a>

                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}">
                            @csrf
                            @method('DELETE')

                            <button class="text-red-600 hover:text-red-700 transition">Elimina</button>
                        </form>
                    </div>

                </div>
            @endforeach

        </div>

    </div>

@endsection