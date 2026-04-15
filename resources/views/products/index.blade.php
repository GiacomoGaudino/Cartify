@extends('layouts.master')

@section('content')

    <h1 class="text-3xl font-bold mb-8">I nostri prodotti</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

        @foreach($products as $product)

            <a href="{{ route('products.show', $product) }}"
                class="block bg-white rounded-2xl shadow hover:shadow-lg transition overflow-hidden">

                <!-- IMAGE -->
                @if($product->image_url)
                    <img src="{{ $product->image_url }}" class="h-40 w-full object-cover">
                @else
                    <div class="h-40 bg-gray-100 flex items-center justify-center text-gray-400">
                        No image
                    </div>
                @endif

                <div class="p-5">

                    <h2 class="text-lg font-semibold">
                        {{ $product->name }}
                    </h2>

                    <p class="text-sm text-gray-500 mt-2 line-clamp-2">
                        {{ $product->description }}
                    </p>

                    <div class="mt-4 flex justify-between items-center">

                        <span class="text-blue-600 font-bold text-lg">
                            € {{ $product->price }}
                        </span>

                        <span class="bg-blue-600 text-white px-4 py-2 rounded-xl text-sm">
                            Aggiungi
                        </span>

                    </div>

                </div>

            </a>

        @endforeach

    </div>

@endsection