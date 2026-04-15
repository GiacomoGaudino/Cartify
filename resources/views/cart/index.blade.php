@extends('layouts.master')

@section('content')

    <h1 class="text-3xl font-bold mb-8">Il tuo carrello 🛒</h1>

    @if(empty($cart))

        <p class="text-gray-500">Il carrello è vuoto.</p>

    @else

        <div class="space-y-4">

            @php $total = 0; @endphp

            @foreach($cart as $id => $item)

                @php
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
                @endphp

                <div class="bg-white p-5 rounded-xl shadow flex justify-between items-center">

                    <div>
                        <h2 class="font-semibold">{{ $item['name'] }}</h2>
                        <p class="text-sm text-gray-500">
                            Quantità: {{ $item['quantity'] }}
                        </p>
                    </div>

                    <div class="text-right">

                        <p class="font-bold text-blue-600">
                            € {{ $subtotal }}
                        </p>

                        <form method="POST" action="{{ route('cart.remove', $id) }}">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="text-red-500 text-sm hover:underline">
                                Rimuovi
                            </button>
                        </form>


                    </div>

                </div>

            @endforeach

        </div>

        <!-- TOTAL -->
        <div class="mt-8 bg-white p-5 rounded-xl shadow flex justify-between items-center">

            <span class="text-lg font-bold">Totale</span>

            <span class="text-2xl font-bold text-green-600">
                € {{ $total }}
            </span>

        </div>

        <!-- CTA -->
        <div class="mt-6">

            <a href="/checkout" class="block text-center bg-green-600 text-white py-3 rounded-xl hover:bg-green-700 transition">
                Procedi al checkout
            </a>

        </div>

    @endif

@endsection