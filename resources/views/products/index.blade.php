@extends('layouts.master')

@section('hideHero', true)

@section('content')

    <h1 class="text-3xl font-bold mb-10">
        I nostri prodotti
    </h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

        @foreach($products as $product)

            <div class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition overflow-hidden flex flex-col">

                <!-- IMAGE CLICK -->
                <a href="{{ route('products.show', $product) }}" class="relative overflow-hidden block">
                    @if($product->image_url)
                        <img src="{{ $product->image_url }}"
                            class="w-full h-64 object-cover group-hover:scale-105 transition duration-300">
                    @else
                        <div class="h-64 bg-gray-100 flex items-center justify-center text-gray-400">
                            No image
                        </div>
                    @endif
                </a>

                <!-- CONTENT -->
                <div class="p-5 flex flex-col flex-grow">

                    <!-- TITLE CLICK -->
                    <a href="{{ route('products.show', $product) }}">
                        <h2
                            class="text-lg font-semibold text-gray-900 line-clamp-2 min-h-[48px] hover:text-blue-600 transition">
                            {{ $product->name }}
                        </h2>
                    </a>

                    <!-- DESCRIPTION -->
                    <p class="text-sm text-gray-500 line-clamp-2 mt-2 min-h-[40px]">
                        {{ $product->description }}
                    </p>

                    <!-- FOOTER -->
                    <div class="mt-auto pt-4 flex items-center justify-between">

                        <span class="text-xl font-bold text-gray-900">
                            € {{ number_format($product->price, 2) }}
                        </span>

                        <div class="flex items-center gap-2">

                            <!-- DETTAGLI -->
                            <a href="{{ route('products.show', $product) }}"
                                class="text-sm text-gray-500 hover:text-primary transition">
                                Dettagli
                            </a>

                            <!-- ADD -->
                            <form method="POST" action="{{ route('cart.add', $product->id) }}">
                                @csrf
                                <button
                                    class="bg-primary text-white px-4 py-2 rounded-xl text-sm hover:bg-primary-hover transition">
                                    Aggiungi
                                </button>
                            </form>

                        </div>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

@endsection