@extends('layouts.master')

@section('hideHero', true)

@section('content')

    <div class="max-w-2xl mx-auto">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Modifica prodotto</h1>
        </div>

        <div class="bg-white rounded-3xl shadow p-8">

            <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                <!-- NAME -->
                <input type="text" name="name" value="{{ $product->name }}" class="w-full rounded-2xl border px-4 py-3">

                <!-- DESCRIPTION -->
                <textarea name="description" class="w-full rounded-2xl border px-4 py-3">
        {{ $product->description }}
                    </textarea>

                <!-- PRICE -->
                <input type="number" step="0.01" name="price" value="{{ $product->price }}"
                    class="w-full rounded-2xl border px-4 py-3">

                <!-- IMAGE -->
                <div>
                    @if($product->image_url)
                        <img src="{{ $product->image_url }}" class="w-32 h-32 rounded-xl mb-3 object-cover">
                    @endif

                    <input type="file" name="image">
                </div>

                <button class="bg-blue-600 text-white px-6 py-3 rounded-2xl">
                    Salva
                </button>

            </form>

        </div>

    </div>

@endsection