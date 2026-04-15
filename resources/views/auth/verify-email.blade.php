@extends('layouts.master')

@section('hideHero', true)

@section('content')

    <div class="max-w-md mx-auto">
        <div class="bg-white rounded-3xl shadow p-8">

            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">
                    Verifica la tua email
                </h1>
                <p class="text-gray-500 mt-2 leading-relaxed">
                    Grazie per esserti registrato. Prima di iniziare, conferma il tuo indirizzo email cliccando sul link che
                    ti abbiamo inviato.
                    Se non hai ricevuto l’email, puoi richiederne un’altra.
                </p>
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-6 rounded-2xl bg-green-100 border border-green-200 text-green-800 px-4 py-3 text-sm">
                    Un nuovo link di verifica è stato inviato al tuo indirizzo email.
                </div>
            @endif

            <div class="space-y-4">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <button type="submit"
                        class="w-full bg-primary text-white py-3 rounded-2xl font-medium hover:bg-primary-hover transition">
                        Invia di nuovo email di verifica
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                        class="w-full border border-gray-200 bg-white text-gray-700 py-3 rounded-2xl font-medium hover:bg-gray-50 hover:text-primary transition">
                        Logout
                    </button>
                </form>
            </div>

        </div>
    </div>

@endsection