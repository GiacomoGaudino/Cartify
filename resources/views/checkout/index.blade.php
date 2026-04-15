@extends('layouts.master')

@section('content')

    <h1 class="text-3xl font-bold mb-8">Checkout 🧾</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        <!-- FORM -->
        <form method="POST" action="/checkout" class="bg-white p-6 rounded-2xl shadow space-y-4">

            @csrf

            <div>
                <label class="text-sm font-medium">Nome</label>
                <input name="name" type="text" class="w-full border rounded-xl p-3 mt-1">
            </div>

            <div>
                <label class="text-sm font-medium">Email</label>
                <input name="email" type="email" class="w-full border rounded-xl p-3 mt-1">
            </div>

            <div>
                <label class="text-sm font-medium">Indirizzo</label>
                <input name="address" type="text" class="w-full border rounded-xl p-3 mt-1">
            </div>

            <button class="w-full bg-green-600 text-white py-3 rounded-xl hover:bg-green-700 transition">
                Conferma ordine
            </button>

        </form>

        <!-- SUMMARY -->
        <div class="bg-white p-6 rounded-2xl shadow">

            <h2 class="text-xl font-bold mb-4">Riepilogo ordine</h2>

            @php $total = 0; @endphp

            @foreach(session('cart', []) as $item)
                @php $total += $item['price'] * $item['quantity']; @endphp

                <div class="flex justify-between text-sm mb-2">
                    <span>{{ $item['name'] }} x{{ $item['quantity'] }}</span>
                    <span>€ {{ $item['price'] * $item['quantity'] }}</span>
                </div>
            @endforeach

            <hr class="my-4">

            <div class="flex justify-between font-bold text-lg">
                <span>Totale</span>
                <span class="text-green-600">€ {{ $total }}</span>
            </div>

        </div>

    </div>

@endsection