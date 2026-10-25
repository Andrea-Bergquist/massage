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
        x-transition:leave="transition ease-in-out duration-[1500ms]" {{-- Ändrat till 1500ms för en långsammare uttoning --}}
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-98" {{-- Ändrat till 98 för en mer subtil krympning --}}
        class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 shadow-sm flex items-center space-x-3">

        <!-- Grön bock-ikon (Heroicons) -->
        <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span class="text-sm font-medium">{{ session('message') }}</span>
    </div>
    @endif

    <div class="bg-white p-8 rounded-2xl shadow-sm border border-stone-200">
        <h2 class="text-2xl font-semibold text-stone-900 mb-6">Kontakta oss</h2>

        <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
            @csrf

            <!-- Namn -->
            <div>
                <label for="name" class="block text-sm font-medium text-stone-700">Namn</label>
                <input id="name"
                    name="name"
                    type="text"
                    value="{{ old('name') }}"
                    required
                    autocomplete="name"
                    class="mt-1 w-full rounded-lg border p-3 outline-none transition focus:ring-1 
               {{ $errors->has('name') ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : 'border-stone-300 focus:border-emerald-600 focus:ring-emerald-600' }}">
                @error('name')
                <p class="mt-1.5 text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- E-post -->
            <div>
                <label for="email" class="block text-sm font-medium text-stone-700">E-post</label>
                <input id="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                    class="mt-1 w-full rounded-lg border p-3 outline-none transition focus:ring-1 
               {{ $errors->has('email') ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : 'border-stone-300 focus:border-emerald-600 focus:ring-emerald-600' }}">
                @error('email')
                <p class="mt-1.5 text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Meddelande -->
            <div>
                <label for="message" class="block text-sm font-medium text-stone-700">Meddelande</label>
                <textarea id="message"
                    name="message"
                    rows="5"
                    required
                    class="mt-1 w-full rounded-lg border p-3 outline-none transition focus:ring-1 
                  {{ $errors->has('message') ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : 'border-stone-300 focus:border-emerald-600 focus:ring-emerald-600' }}">{{ old('message') }}</textarea>
                @error('message')
                <p class="mt-1.5 text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            {{-- Honeypot --}}
            <div aria-hidden="true" class="absolute left-[-10000px] top-auto h-px w-px overflow-hidden">
                <label for="website">Lämna detta fält tomt</label>
                <input id="website" name="website" type="text" tabindex="-1" autocomplete="off">
            </div>

            <button type="submit"
                class="w-full sm:w-auto rounded-lg bg-emerald-900 px-6 py-3 font-medium text-white hover:bg-emerald-800 transition duration-200">
                Skicka meddelande
            </button>
        </form>
    </div>
</div>

@endsection