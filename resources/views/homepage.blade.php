@extends('layouts.master')

@section('content')

    <div class="space-y-12">

        <!-- HERO -->
        <section class="bg-white rounded-3xl shadow p-8 md:p-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

                <div>
                    <span class="inline-block bg-blue-100 text-primary text-sm font-semibold px-4 py-2 rounded-full">
                        Welcome to Cartify
                    </span>

                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mt-6 leading-tight">
                        A simple and modern shopping experience
                    </h1>

                    <p class="text-gray-500 text-lg mt-5 leading-relaxed">
                        Discover a clean e-commerce experience built to make browsing, shopping, and checkout fast and
                        intuitive.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="{{ route('products.index') }}"
                            class="bg-primary text-white px-6 py-3 rounded-2xl font-medium hover:bg-primary-hover transition">
                            Shop now
                        </a>

                        <a href="#about"
                            class="bg-gray-100 text-gray-700 px-6 py-3 rounded-2xl font-medium hover:bg-blue-100 transition">
                            Learn more
                        </a>
                    </div>
                </div>

                <div class="h-72 md:h-96 rounded-3xl overflow-hidden group">

                    <img src="{{ asset('imgs/hero.png') }}" alt="Hero Image"
                        class="w-full h-full object-cover transition duration-500 group-hover:scale-105">

                </div>

            </div>
        </section>

        <!-- ABOUT -->
        <section id="about" class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl shadow p-6">
                <h2 class="text-xl font-bold text-gray-900">Clean design</h2>
                <p class="text-gray-500 mt-3 leading-relaxed">
                    A minimal interface designed to keep the shopping experience simple, clear, and enjoyable.
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow p-6">
                <h2 class="text-xl font-bold text-gray-900">Easy browsing</h2>
                <p class="text-gray-500 mt-3 leading-relaxed">
                    Explore products quickly through an intuitive layout that keeps the focus on what matters most.
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow p-6">
                <h2 class="text-xl font-bold text-gray-900">Smooth checkout</h2>
                <p class="text-gray-500 mt-3 leading-relaxed">
                    Add items to your cart and complete your order through a straightforward and frictionless flow.
                </p>
            </div>
        </section>

        <!-- FEATURE SECTION -->
        <section class="bg-white rounded-3xl shadow p-8 md:p-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

                <div
                    class="h-72 bg-gray-100 rounded-3xl flex items-center justify-center text-gray-300 text-lg font-medium">
                    <img src="{{ asset('imgs/featured.png') }}" alt="Feature Image"
                        class="h-full w-full object-cover rounded-3xl">
                </div>

                <div>
                    <span class="inline-block bg-gray-100 text-gray-600 text-sm font-semibold px-4 py-2 rounded-full">
                        Why Cartify
                    </span>

                    <h2 class="text-3xl font-bold text-gray-900 mt-6 leading-tight">
                        Built to feel simple, polished, and functional
                    </h2>

                    <p class="text-gray-500 mt-5 leading-relaxed">
                        Cartify was designed as a modern e-commerce platform focused on usability and clarity, from product
                        discovery to checkout confirmation.
                    </p>

                    <ul class="mt-6 space-y-3 text-gray-600">
                        <li class="flex items-center gap-3">
                            <span class="w-2.5 h-2.5 bg-primary rounded-full"></span>
                            Responsive and user-friendly layout
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="w-2.5 h-2.5 bg-primary rounded-full"></span>
                            Product pages with clear structure
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="w-2.5 h-2.5 bg-primary rounded-full"></span>
                            Cart and checkout flow designed for simplicity
                        </li>
                    </ul>
                </div>

            </div>
        </section>

        <!-- CTA -->
        <section class="bg-primary text-white rounded-3xl shadow p-8 md:p-12">

            <div class="max-w-2xl">

                <h2 class="text-3xl md:text-4xl font-bold leading-tight">
                    Start exploring Cartify today
                </h2>

                <p class="text-primary-light text-lg mt-4 leading-relaxed">
                    Browse the catalog, discover the product pages, and experience the full shopping flow from cart to
                    checkout.
                </p>

                <div class="mt-8">
                    <a href="{{ route('products.index') }}"
                        class="inline-block bg-white text-primary px-6 py-3 rounded-2xl font-medium hover:bg-blue-100 transition">
                        Explore products
                    </a>
                </div>

            </div>

        </section>

    </div>

@endsection