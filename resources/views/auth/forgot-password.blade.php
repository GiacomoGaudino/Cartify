@extends('layouts.master')

@section('hideHero', true)

@section('content')

    <div class="max-w-md mx-auto">
        <div class="bg-white rounded-3xl shadow p-8">

            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">
                    Password dimenticata
                </h1>
                <p class="text-gray-500 mt-2">
                    Inserisci la tua email e ti invieremo un link per reimpostare la password.
                </p>
            </div>

            @if (session('status'))
                <div class="mb-6 rounded-2xl bg-green-100 border border-green-200 text-green-800 px-4 py-3 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Email
                    </label>

                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full rounded-2xl border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                    @error('email')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-2xl font-medium hover:bg-blue-700 transition">
                    Invia link di reset
                </button>
            </form>

            <div class="mt-6 text-center text-sm text-gray-500">
                Ti sei ricordato la password?
                <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:text-blue-700 transition">
                    Accedi
                </a>
            </div>

        </div>
    </div>

@endsection