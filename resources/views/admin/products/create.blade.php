@extends('layouts.master')

@section('hideHero', true)

@section('content')

    <div class="max-w-2xl mx-auto">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Nuovo prodotto</h1>
            <p class="text-gray-500 mt-2">Inserisci le informazioni del prodotto</p>
        </div>

        <div class="bg-white rounded-3xl shadow p-8">

            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data"
                class="space-y-6">
                @csrf

                <!-- NAME -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nome prodotto</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full rounded-2xl border border-gray-200 px-4 py-3 focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <!-- DESCRIPTION -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Descrizione</label>
                    <textarea name="description" rows="4"
                        class="w-full rounded-2xl border border-gray-200 px-4 py-3 focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
                </div>

                <!-- PRICE -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Prezzo (€)</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price') }}"
                        class="w-full rounded-2xl border border-gray-200 px-4 py-3 focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <!-- IMAGE -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Immagine prodotto</label>
                    <input type="file" name="image" class="w-full text-sm text-gray-600">
                </div>

                <div class="flex justify-between pt-4">
                    <a href="{{ route('admin.products.index') }}" class="text-gray-500">← Indietro</a>

                    <button class="bg-blue-600 text-white px-6 py-3 rounded-2xl hover:bg-blue-700">
                        Crea prodotto
                    </button>
                </div>

            </form>

        </div>

    </div>

@endsection