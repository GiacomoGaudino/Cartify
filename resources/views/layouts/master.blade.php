<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Cartify</title>
</head>

<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col">

    <!-- NAVBAR -->
    <header class="bg-white shadow-sm border-b">
        <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">

            <!-- LOGO -->
            <a href="{{ url('/') }}" class="text-2xl font-bold text-primary">
                🛍️ Cartify
            </a>

            @php
                $cart = session('cart', []);
                $cartCount = array_sum(array_map(fn($item) => $item['quantity'], $cart));
            @endphp

            <div class="flex items-center gap-8">

                <!-- MENU -->
                <nav class="flex items-center gap-6 text-sm font-medium">

                    <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-primary transition">
                        Prodotti
                    </a>

                    <a href="{{ route('cart.index') }}" class="text-gray-700 hover:text-primary transition relative">
                        Carrello

                        @if($cartCount > 0)
                            <span
                                class="absolute -top-2 -right-3 bg-red-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>

                    <a href="{{ route('checkout.index') }}" class="text-gray-700 hover:text-primary transition">
                        Checkout
                    </a>

                </nav>

                <!-- DIVIDER -->
                <div class="h-6 w-px bg-gray-200"></div>

                <!-- AUTH -->
                <div class="flex items-center gap-3 text-sm font-medium">

                    @auth
                        @if(auth()->user()->is_admin)
                            <a href="{{ route('admin.products.index') }}"
                                class="px-3 py-2 text-gray-600 hover:text-primary transition">
                                Admin
                            </a>
                        @endif

                        <a href="{{ route('orders.index') }}" class="px-3 py-2 text-gray-600 hover:text-primary transition">
                            I miei ordini
                        </a>

                        <span class="text-gray-600 hidden sm:inline">
                            Ciao, {{ Auth::user()->name }}
                        </span>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="px-4 py-2 rounded-xl border border-gray-200 bg-white text-gray-700 hover:bg-primary hover:text-white transition">
                                Logout
                            </button>
                        </form>

                    @else
                        <a href="{{ route('login') }}" class="px-3 py-2 text-gray-600 hover:text-primary transition">
                            Login
                        </a>

                        <a href="{{ route('register') }}"
                            class="px-4 py-2 rounded-xl bg-primary text-white hover:bg-primary-hover transition shadow-sm">
                            Register
                        </a>
                    @endauth

                </div>

            </div>

        </div>
    </header>

    <!-- HERO -->
    @if (!View::hasSection('hideHero'))
        <section class="relative h-[500px] md:h-[600px] rounded-b-3xl overflow-hidden">

            <!-- BACKGROUND -->
            <div class="absolute inset-0 bg-cover"
                style="background-image: url('{{ asset('imgs/banner.png') }}'); background-position: center 60%;">
            </div>

            <!-- OVERLAY -->
            <div class="absolute inset-0 bg-primary/70"></div>

            <!-- CONTENT -->
            <div class="relative z-10 max-w-6xl mx-auto px-4 h-full flex items-center">

                <div class="text-white max-w-xl">

                    <h1 class="text-4xl md:text-5xl font-bold leading-tight">
                        Technology that fits your lifestyle
                    </h1>

                    <p class="mt-4 text-primary-light text-lg">
                        Discover premium devices designed for work, entertainment, and everyday use.
                    </p>

                    <div class="mt-6">
                        <a href="{{ route('products.index') }}"
                            class="bg-white text-primary px-6 py-3 rounded-2xl font-medium hover:bg-gray-100 transition">
                            Explore products
                        </a>
                    </div>

                </div>

            </div>

        </section>
    @endif

    <!-- MAIN -->
    <main class="flex-grow max-w-6xl mx-auto px-4 py-10 w-full">

        @if(session('success'))
            <div class="mb-6 rounded-2xl bg-green-100 border border-green-200 text-green-800 px-4 py-3">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 rounded-2xl bg-red-100 border border-red-200 text-red-800 px-4 py-3">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')

    </main>

    <!-- FOOTER -->
    <footer class="bg-white border-t mt-auto">
        <div class="max-w-6xl mx-auto px-4 py-6 text-sm text-gray-500 text-center">
            © {{ date('Y') }} Cartify, Built with Laravel 💙
        </div>
    </footer>

</body>

</html>