@extends('layouts.app')

@section('title', 'Thai Serenity | Logga in')

@section('content')

<section class="relative bg-emerald-950 text-white min-h-screen flex items-center justify-center overflow-hidden py-24">
    <!-- Bakgrundsbild -->
    <img
        src="{{ asset('images/hero_1.jpeg') }}"
        alt="Thaimassage hero"
        class="absolute inset-0 h-full w-full object-cover object-center" />

    <!-- Mörkt overlay för att göra texten läsbar (ca 60% opacitet) -->
    <div class="absolute inset-0 bg-emerald-950/60 mix-blend-multiply"></div>

    <!-- Inloggningskort (Placeras ovanpå bilden med z-10) -->
    <div class="relative z-10 w-full max-w-md px-6">
        <div class="rounded-2xl border border-white/10 bg-emerald-950/80 p-8 shadow-2xl backdrop-blur-md">

            <!-- Logotyp/Rubrik -->
            <div class="text-center mb-8">
                <p class="text-xs font-semibold uppercase tracking-[0.25em] text-emerald-200 mb-2">
                    Välkommen tillbaka
                </p>
                <h1 class="text-3xl font-semibold text-white tracking-tight">
                    Logga in
                </h1>
            </div>

            <!-- Session Status (Breeze standardfel/meddelanden) -->
            @if (session('status'))
            <div class="mb-4 text-sm font-medium text-emerald-400 text-center">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- E-postadress -->
                <div>
                    <label for="email" class="block text-sm font-medium text-stone-200 mb-1">
                        E-postadress
                    </label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                        class="w-full rounded-full border border-white/20 bg-white/10 px-4 py-3 text-white placeholder-stone-400 backdrop-blur-sm focus:border-emerald-400 focus:outline-none focus:ring-1 focus:ring-emerald-400 transition"
                        placeholder="namn@exempel.se" />
                    @if ($errors->has('email'))
                    <p class="mt-1 text-xs text-red-400">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <!-- Lösenord -->
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <label for="password" class="block text-sm font-medium text-stone-200">
                            Lösenord
                        </label>
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-xs text-emerald-300 hover:text-emerald-200 transition">
                            Glömt lösenord?
                        </a>
                        @endif
                    </div>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        class="w-full rounded-full border border-white/20 bg-white/10 px-4 py-3 text-white placeholder-stone-400 backdrop-blur-sm focus:border-emerald-400 focus:outline-none focus:ring-1 focus:ring-emerald-400 transition"
                        placeholder="••••••••" />
                    @if ($errors->has('password'))
                    <p class="mt-1 text-xs text-red-400">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <!-- Kom ihåg mig -->
                <div class="flex items-center">
                    <input
                        id="remember_me"
                        type="checkbox"
                        name="remember"
                        class="h-4 w-4 rounded border-white/20 bg-white/10 text-emerald-600 focus:ring-emerald-400 focus:ring-offset-emerald-950 transition cursor-pointer" />
                    <label for="remember_me" class="ml-2 text-sm text-stone-200 cursor-pointer select-none">
                        Kom ihåg mig
                    </label>
                </div>

                <!-- Logga in knapp -->
                <div>
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-full bg-emerald-600 px-6 py-3 font-medium text-white hover:bg-emerald-700 transition shadow-lg cursor-pointer">
                        Logga in
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </button>
                </div>
            </form>

            <!-- Registreringslänk -->
            @if (Route::has('register'))
            <div class="mt-6 text-center text-sm text-stone-300">
                Har du inget konto?
                <a href="{{ route('register') }}" class="font-medium text-emerald-300 hover:text-emerald-200 transition">
                    Skapa ett konto här
                </a>
            </div>
            @endif

        </div>
    </div>
</section>

@endsection