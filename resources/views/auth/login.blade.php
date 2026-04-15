@extends('layouts.master')

@section('hideHero', true)

@section('content')

    <div class="max-w-md mx-auto">
        <div class="bg-white rounded-3xl shadow p-8">

            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">
                    Accedi
                </h1>
                <p class="text-gray-500 mt-2">
                    Bentornato su Cartify
                </p>
            </div>

            @if (session('status'))
                <div class="mb-6 rounded-2xl bg-green-100 border border-green-200 text-green-800 px-4 py-3 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Email
                    </label>

                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        autocomplete="username"
                        class="w-full rounded-2xl border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                    @error('email')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        Password
                    </label>

                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="w-full rounded-2xl border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                    @error('password')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember + Forgot -->
                <div class="flex items-center justify-between gap-4">
                    <label for="remember_me" class="inline-flex items-center text-sm text-gray-600">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-700 transition">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-2xl font-medium hover:bg-blue-700 transition">
                    Log in
                </button>
            </form>

            <div class="mt-6 text-center text-sm text-gray-500">
                Non hai ancora un account?
                <a href="{{ route('register') }}" class="text-blue-600 font-medium hover:text-blue-700 transition">
                    Registrati
                </a>
            </div>

        </div>
    </div>

@endsection