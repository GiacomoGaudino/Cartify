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
            <a href="/products" class="text-2xl font-bold text-blue-600">
                🛍️ Cartify
            </a>

            <!-- MENU -->
            <nav class="flex items-center gap-6 text-sm font-medium">

                <a href="/products" class="hover:text-blue-600 transition">
                    Prodotti
                </a>

                @php
                    $cart = session('cart', []);

                    $cartCount = array_sum(array_map(function ($item) {
                        return $item['quantity'];
                    }, $cart));
                @endphp

                <a href="/cart" class="hover:text-blue-600 transition relative">
                    Carrello

                    @if($cartCount > 0)
                        <span
                            class="absolute -top-2 -right-3 bg-red-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>

                <a href="/checkout" class="hover:text-blue-600 transition">
                    Checkout
                </a>

            </nav>

        </div>
    </header>

    <!-- HERO (opzionale ma bello per e-commerce) -->
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

    <!-- CONTENUTO PAGINA -->
    <main class="max-w-6xl mx-auto px-4 py-10">

        @yield('content')

    </main>

    <!-- FOOTER -->
    <footer class="bg-white border-t mt-20">
        <div class="max-w-6xl mx-auto px-4 py-6 text-sm text-gray-500 text-center">
            © {{ date('Y') }} Cartify - Built with Laravel 💙
        </div>
    </footer>

</body>

</html>

</html>