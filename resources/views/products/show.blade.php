@extends('layouts.master')

@section('content')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

        <!-- IMAGE -->
        <div>
            @if($product->image_url)
                <img src="{{ $product->image_url }}" class="w-full rounded-2xl object-cover">
            @endif
        </div>

        <!-- INFO -->
        <div>

            <h1 class="text-3xl font-bold">
                {{ $product->name }}
            </h1>

            <p class="text-gray-500 mt-4">
                {{ $product->description }}
            </p>

            <p class="text-2xl font-bold text-blue-600 mt-6">
                € {{ $product->price }}
            </p>

            <button class="mt-6 bg-blue-600 text-white px-6 py-3 rounded-2xl">
                Aggiungi al carrello
            </button>

        </div>

    </div>

@endsection