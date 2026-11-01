@extends('layouts.app')

@section('title', 'Kontakt | Thai Serenity')

@section('contact')

<!-- ÄNDRING: Bytt min-h-[600px] till min-h-[300px] eller md:min-h-[400px] för en lägre profil -->
<section class="relative bg-emerald-950 text-white min-h-[300px] md:min-h-[400px] flex items-center overflow-hidden">
    <!-- Bakgrundsbild (object-cover ser till att bilden behåller sina proportioner och aldrig förvrängs) -->
    <img
        src="{{ asset('images/hero_contact.png') }}"
        alt="Thaimassage hero"
        class="absolute inset-0 h-full w-full object-cover object-center" />

    <!-- Mörkt overlay för att göra texten läsbar (ca 60% opacitet) -->
    <div class="absolute inset-0 bg-emerald-950/60 mix-blend-multiply"></div>

    <!-- Innehåll (ÄNDRING: Minskat py-24 till py-16 på desktop och py-12 på mobil för att spara vertikalt utrymme) -->
    <div class="relative z-10 mx-auto max-w-7xl px-6 py-12 md:py-16 w-full">
        <p class="mb-2 text-sm font-semibold uppercase tracking-[0.25em] text-emerald-200">
            Kontaktsidan
        </p>
        <h1 class="max-w-2xl text-3xl font-semibold leading-tight md:text-5xl">
            Använd formuläret för att kontakta oss.
        </h1>
    </div>
</section>

<!-- Placera flash-meddelandet precis ovanför eller inuti formulär-containern för bästa UX -->
<div class="max-w-xl mx-auto my-20 px-4 sm:px-0">

    @if(session('message'))
    <div x-data="{ show: true }"
        x-show="show"
        x-init="setTimeout(() => show = false, 3000)"
        x-transition:leave="transition ease-in-out duration-[1500ms]"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-98"
        class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 shadow-sm flex items-center space-x-3">

        <!-- Grön bock-ikon (Heroicons) -->
        <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span class="text-sm font-medium">{{ session('message') }}</span>
    </div>
    @endif

    <!-- NY DESIGN: Matchar inloggningskortets utseende perfekt -->
    <div class="rounded-2xl border border-white/10 bg-emerald-950/80 p-8 shadow-2xl backdrop-blur-md">

        <!-- Rubrik formaterad som inloggningskortet -->
        <div class="text-center mb-8">
            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-emerald-200 mb-2">
                Hör av dig till oss
            </p>
            <h2 class="text-3xl font-semibold text-white tracking-tight">
                Kontakta oss
            </h2>
        </div>

        <form method="POST" action="{{ route('contact.store') }}" class="space-y-6">
            @csrf

            <!-- Namn -->
            <div>
                <label for="name" class="block text-sm font-medium text-stone-200 mb-1">Namn</label>
                <input id="name"
                    name="name"
                    type="text"
                    value="{{ old('name') }}"
                    required
                    autocomplete="name"
                    placeholder="Ditt för- och efternamn"
                    class="w-full rounded-full border bg-white/10 px-4 py-3 text-white placeholder-stone-400 backdrop-blur-sm focus:outline-none focus:ring-1 transition
                    {{ $errors->has('name') ? 'border-red-400 focus:border-red-400 focus:ring-red-400' : 'border-white/20 focus:border-emerald-400 focus:ring-emerald-400' }}">
                @error('name')
                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- E-post -->
            <div>
                <label for="email" class="block text-sm font-medium text-stone-200 mb-1">E-post</label>
                <input id="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                    placeholder="namn@exempel.se"
                    class="w-full rounded-full border bg-white/10 px-4 py-3 text-white placeholder-stone-400 backdrop-blur-sm focus:outline-none focus:ring-1 transition
                    {{ $errors->has('email') ? 'border-red-400 focus:border-red-400 focus:ring-red-400' : 'border-white/20 focus:border-emerald-400 focus:ring-emerald-400' }}">
                @error('email')
                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Meddelande -->
            <div>
                <label for="message" class="block text-sm font-medium text-stone-200 mb-1">Meddelande</label>
                <!-- Notera: Avrundat hörn ändrat till rounded-2xl här eftersom rounded-full inte fungerar bra på textareas -->
                <textarea id="message"
                    name="message"
                    rows="5"
                    required
                    placeholder="Skriv ditt meddelande här..."
                    class="w-full rounded-2xl border bg-white/10 px-4 py-3 text-white placeholder-stone-400 backdrop-blur-sm focus:outline-none focus:ring-1 transition
                    {{ $errors->has('message') ? 'border-red-400 focus:border-red-400 focus:ring-red-400' : 'border-white/20 focus:border-emerald-400 focus:ring-emerald-400' }}">{{ old('message') }}</textarea>
                @error('message')
                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Honeypot --}}
            <div aria-hidden="true" class="absolute left-[-10000px] top-auto h-px w-px overflow-hidden">
                <label for="website">Lämna detta fält tomt</label>
                <input id="website" name="website" type="text" tabindex="-1" autocomplete="off">
            </div>

            <!-- CLOUDFLARE TURNSTILE WIDGET -->
            <!-- data-theme="dark" gör att den matchar det mörka kortet perfekt -->
            <div class="flex justify-center py-2">
                <div class="cf-turnstile"
                    data-sitekey="{{ config('services.cloudflare_turnstile.site_key') }}"
                    data-theme="dark"
                    data-size="flexible">
                </div>
            </div>
            @error('cf-turnstile-response')
            <p class="text-center text-xs text-red-400 mt-[-12px] mb-2">{{ $message }}</p>
            @enderror

            <!-- Knapp med full bredd och matchande ikon för skicka-funktionen -->
            <div>
                <button type="submit"
                    class="w-full inline-flex items-center justify-center gap-2 rounded-full bg-emerald-600 px-6 py-3 font-medium text-white hover:bg-emerald-700 transition shadow-lg cursor-pointer">
                    Skicka meddelande
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>

@endsection