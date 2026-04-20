@extends('layouts.master')

@section('hideHero', true)

@section('content')

    <div class="max-w-5xl mx-auto space-y-6">

        <!-- HEADER -->
        <div>

            <a href="{{ route('admin.dashboard') }}"
                class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-primary transition mb-3">
                ← Back to Dashboard
            </a>

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                <div>
                    <h1 class="text-2xl font-bold text-gray-900">
                        Product Management
                    </h1>

                    <p class="text-gray-500 mt-1">
                        View, edit, and manage your store products.
                    </p>
                </div>

                <a href="{{ route('admin.products.create') }}"
                    class="bg-primary text-white px-4 py-2 rounded-xl hover:bg-primary-hover transition">
                    New Product
                </a>

            </div>

        </div>

        <!-- PRODUCTS LIST -->
        <div class="bg-white rounded-3xl shadow p-6">

            @forelse($products as $product)

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 border-b py-4 last:border-b-0">

                    <div>
                        <p class="font-semibold text-gray-900">
                            {{ $product->name }}
                        </p>

                        <p class="text-sm text-gray-500">
                            € {{ number_format($product->price, 2) }}
                        </p>
                    </div>

                    <div class="flex items-center gap-4">

                        <a href="{{ route('admin.products.edit', $product) }}" class="text-primary font-medium hover:underline">
                            Edit
                        </a>

                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="text-red-600 font-medium hover:underline">
                                Delete
                            </button>
                        </form>

                    </div>

                </div>

            @empty

                <div class="text-center text-gray-500 py-8">
                    No products found.
                </div>

            @endforelse

        </div>

    </div>

@endsection