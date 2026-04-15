@extends('layouts.master')

@section('hideHero', true)

@section('content')

    <div class="max-w-md mx-auto">
        <div class="bg-white rounded-3xl shadow p-8">

            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">
                    Conferma password
                </h1>
                <p class="text-gray-500 mt-2">
                    Questa è un’area riservata. Inserisci la tua password per continuare.
                </p>
            </div>

            <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        Password
                    </label>

                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="w-full rounded-2xl border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">

                    @error('password')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-primary text-white py-3 rounded-2xl font-medium hover:bg-primary-hover transition">
                    Conferma
                </button>
            </form>

        </div>
    </div>

@endsection