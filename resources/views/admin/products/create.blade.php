@extends('layouts.master')

@section('hideHero', true)

@section('content')

    <div class="max-w-2xl mx-auto">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">
                Nuovo prodotto
            </h1>
            <p class="text-gray-500 mt-2">
                Inserisci le informazioni del prodotto
            </p>
        </div>

        <div class="bg-white rounded-3xl shadow p-8">

            <form method="POST" action="{{ route('admin.products.store') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nome prodotto
                    </label>

                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full rounded-2xl border border-gray-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required>

                    @error('name')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Descrizione
                    </label>

                    <textarea name="description" rows="4"
                        class="w-full rounded-2xl border border-gray-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>

                    @error('description')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Prezzo (€)
                    </label>

                    <input type="number" step="0.01" name="price" value="{{ old('price') }}"
                        class="w-full rounded-2xl border border-gray-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required>

                    @error('price')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between pt-4">

                    <a href="{{ route('admin.products.index') }}" class="text-gray-500 hover:text-gray-700 transition">
                        ← Torna indietro
                    </a>

                    <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-2xl hover:bg-blue-700 transition">
                        Crea prodotto
                    </button>

                </div>

            </form>

        </div>

    </div>

@endsection