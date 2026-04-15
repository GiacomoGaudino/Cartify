<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Cartify</title>
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- NAVBAR -->
    <header class="bg-white shadow-sm border-b">
        <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">

            <!-- LOGO -->
            <a href="{{ url('/') }}" class="text-2xl font-bold text-blue-600">
                🛍️ Cartify
            </a>

            @php
                $cart = session('cart', []);

                $cartCount = array_sum(array_map(function ($item) {
                    return $item['quantity'];
                }, $cart));
            @endphp

            <!-- MENU -->
            <div class="flex items-center gap-8">

                <!-- MENU SHOP -->
                <nav class="flex items-center gap-6 text-sm font-medium">

                    <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-blue-600 transition">
                        Prodotti
                    </a>

                    <a href="{{ route('cart.index') }}" class="text-gray-700 hover:text-blue-600 transition relative">
                        Carrello

                        @if($cartCount > 0)
                            <span
                                class="absolute -top-2 -right-3 bg-red-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>

                    <a href="{{ route('checkout.index') }}" class="text-gray-700 hover:text-blue-600 transition">
                        Checkout
                    </a>

                </nav>

                <!-- DIVIDER -->
                <div class="h-6 w-px bg-gray-200"></div>

                <!-- AUTH -->
                <div class="flex items-center gap-3 text-sm font-medium">

                    @auth
                        <span class="text-gray-600 hidden sm:inline">
                            Ciao, {{ Auth::user()->name }}
                        </span>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="px-4 py-2 rounded-xl border border-gray-200 bg-white text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition">
                                Logout
                            </button>
                        </form>

                    @else
                        <a href="{{ route('login') }}" class="px-3 py-2 text-gray-600 hover:text-blue-600 transition">
                            Login
                        </a>

                        <a href="{{ route('register') }}"
                            class="px-4 py-2 rounded-xl bg-blue-600 text-white hover:bg-blue-700 transition shadow-sm">
                            Register
                        </a>
                    @endauth

                </div>

            </div>

        </div>
    </header>

    <!-- HERO -->
    @if (!View::hasSection('hideHero'))
        <section class="bg-blue-600 text-white">
            <div class="max-w-6xl mx-auto px-4 py-12">
                <h1 class="text-4xl font-bold">
                    Benvenuto su Cartify 🚀
                </h1>

                <p class="mt-2 text-blue-100">
                    Il tuo e-commerce Laravel moderno e minimal.
                </p>
            </div>
        </section>
    @endif

    <!-- FLASH MESSAGES -->
    <main class="max-w-6xl mx-auto px-4 py-10">

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
    <footer class="bg-white border-t mt-20">
        <div class="max-w-6xl mx-auto px-4 py-6 text-sm text-gray-500 text-center">
            © {{ date('Y') }} Cartify, Built with Laravel 💙
        </div>
    </footer>

</body>

</html>