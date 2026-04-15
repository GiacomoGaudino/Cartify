@extends('layouts.master')

@section('hideHero', true)

@section('content')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">

        <!-- IMAGE -->
        <div>
            @if($product->image_url)
                <img src="{{ $product->image_url }}" class="w-full rounded-3xl object-cover shadow-sm">
            @else
                <div class="w-full h-96 bg-gray-100 flex items-center justify-center text-gray-400 rounded-3xl">
                    No image
                </div>
            @endif
        </div>

        <!-- INFO -->
        <div class="flex flex-col">

            <h1 class="text-3xl font-bold text-gray-900">
                {{ $product->name }}
            </h1>

            <p class="text-gray-500 mt-4 leading-relaxed">
                {{ $product->description }}
            </p>

            <p class="text-3xl font-bold text-primary mt-6">
                € {{ number_format($product->price, 2) }}
            </p>

            <!-- ADD TO CART -->
            <form method="POST" action="{{ route('cart.add', $product->id) }}">
                @csrf

                <button type="submit"
                    class="mt-6 w-full md:w-auto bg-primary text-white px-8 py-3 rounded-2xl hover:bg-primary-hover transition font-medium">
                    Aggiungi al carrello
                </button>
            </form>

            <!-- LINK CARRELLO -->
            <a href="{{ route('cart.index') }}" class="mt-4 text-sm text-gray-500 hover:text-primary transition">
                Vai al carrello
            </a>

        </div>

    </div>

@endsection