@extends('layouts.master')

@section('hideHero', true)

@section('content')

    <div class="max-w-2xl mx-auto">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">
                Modifica prodotto
            </h1>
            <p class="text-gray-500 mt-2">
                Aggiorna le informazioni del prodotto
            </p>
        </div>

        <div class="bg-white rounded-3xl shadow p-8">

            <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                <!-- NAME -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nome prodotto
                    </label>

                    <input type="text" name="name" value="{{ old('name', $product->name) }}"
                        class="w-full rounded-2xl border border-gray-200 px-4 py-3 focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <!-- DESCRIPTION -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Descrizione
                    </label>

                    <textarea name="description" rows="4"
                        class="w-full rounded-2xl border border-gray-200 px-4 py-3 focus:ring-2 focus:ring-blue-500">{{ old('description', $product->description) }}</textarea>
                </div>

                <!-- PRICE -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Prezzo (€)
                    </label>

                    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}"
                        class="w-full rounded-2xl border border-gray-200 px-4 py-3 focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <!-- IMAGE UPLOAD -->
                <div x-data="{ imagePreview: '{{ $product->image_url }}' }">

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Immagine prodotto
                    </label>

                    <label
                        class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed border-gray-300 rounded-2xl cursor-pointer hover:border-blue-500 transition overflow-hidden">

                        <!-- EMPTY -->
                        <template x-if="!imagePreview">
                            <div class="text-center">
                                <p class="text-sm text-gray-500">
                                    Clicca per caricare un'immagine
                                </p>
                            </div>
                        </template>

                        <!-- PREVIEW -->
                        <template x-if="imagePreview">
                            <img :src="imagePreview" class="w-full h-full object-cover">
                        </template>

                        <input type="file" name="image" class="hidden"
                            @change="imagePreview = URL.createObjectURL($event.target.files[0])">
                    </label>

                </div>

                <!-- ACTIONS -->
                <div class="flex justify-between pt-4">

                    <a href="{{ route('admin.products.index') }}" class="text-gray-500 hover:text-gray-700 transition">
                        ← Torna indietro
                    </a>

                    <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-2xl hover:bg-blue-700 transition">
                        Salva modifiche
                    </button>

                </div>

            </form>

        </div>

    </div>

@endsection