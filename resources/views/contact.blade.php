@extends('layouts.app')

@section('title', 'Kontakt | Thai Serenity')

@section('contact')

<section class="relative bg-emerald-950 text-white min-h-[600px] flex items-center overflow-hidden">
    <!-- Bakgrundsbild -->
    <img
        src="{{ asset('images/hero_contact.png') }}"
        alt="Thaimassage hero"
        class="absolute inset-0 h-full w-full object-cover object-center" />

    <!-- Mörkt overlay för att göra texten läsbar (ca 60% opacitet) -->
    <div class="absolute inset-0 bg-emerald-950/60 mix-blend-multiply"></div>

    <!-- Innehåll (Placeras ovanpå bilden med z-10) -->
    <div class="relative z-10 mx-auto max-w-7xl px-6 py-24 w-full">
        <p class="mb-4 text-sm font-semibold uppercase tracking-[0.25em] text-emerald-200">
            Kontaktsidan
        </p>
        <h1 class="max-w-2xl text-4xl font-semibold leading-tight md:text-6xl">
            Använd formuläret för att kontakta oss.
        </h1>

    </div>
</section>

@if(session('message'))
<div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 shadow-sm flex items-center space-x-3">
    <!-- Grön bock-ikon (Heroicons) -->
    <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <span class="text-sm font-medium">{{ session('message') }}</span>
</div>
@endif

<div class="max-w-xl mx-auto bg-white p-8 rounded-2xl shadow-sm border border-stone-200 my-20">
    <h1 class="text-2xl font-semibold text-stone-900 mb-6">Kontakta oss</h1>

    <form method="POST" action="" class="space-y-5">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-stone-700">Namn</label>
            <input id="name" name="name" required autocomplete="name"
                class="mt-1 w-full rounded-lg border border-stone-300 p-3 focus:border-emerald-600 focus:ring-1 focus:ring-emerald-600 outline-none">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-stone-700">E-post</label>
            <input id="email" name="email" type="email" required autocomplete="email"
                class="mt-1 w-full rounded-lg border border-stone-300 p-3 focus:border-emerald-600 focus:ring-1 focus:ring-emerald-600 outline-none">
        </div>

        <div>
            <label for="message" class="block text-sm font-medium text-stone-700">Meddelande</label>
            <textarea id="message" name="message" rows="5" required
                class="mt-1 w-full rounded-lg border border-stone-300 p-3 focus:border-emerald-600 focus:ring-1 focus:ring-emerald-600 outline-none"></textarea>
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

@endsection