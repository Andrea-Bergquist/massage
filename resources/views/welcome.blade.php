@extends('layouts.app')

@section('title', 'Thai Serenity | Balans för kropp och själ')

@section('content')

<section class="relative bg-emerald-950 text-white min-h-[600px] flex items-center overflow-hidden">
    <!-- Bakgrundsbild -->
    <img
        src="{{ asset('images/hero_1.jpeg') }}"
        alt="Thaimassage hero"
        class="absolute inset-0 h-full w-full object-cover object-center" />

    <!-- Mörkt overlay för att göra texten läsbar (ca 60% opacitet) -->
    <div class="absolute inset-0 bg-emerald-950/60 mix-blend-multiply"></div>

    <!-- Innehåll (Placeras ovanpå bilden med z-10) -->
    <div class="relative z-10 mx-auto max-w-7xl px-6 py-24 w-full">
        <p class="mb-4 text-sm font-semibold uppercase tracking-[0.25em] text-emerald-200">
            Traditionell thaimassage
        </p>
        <h1 class="max-w-2xl text-4xl font-semibold leading-tight md:text-6xl">
            Balans för kropp och själ
        </h1>
        <p class="mt-6 max-w-xl text-stone-200 text-lg">
            Upplev äkta thailändsk massage i en lugn och harmonisk miljö. Vi hjälper dig att slappna av, minska stress och återfå din energi.
        </p>

        <!-- Knappar enligt skissen -->
        <div class="mt-10 flex flex-wrap gap-4">
            <a href="#booking" class="inline-flex items-center gap-2 rounded-full bg-emerald-600 px-6 py-3 font-medium text-white hover:bg-emerald-700 transition">
                Boka din behandling
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
            </a>
            <a href="#treatments" class="inline-flex rounded-full border border-white/40 bg-white/10 px-6 py-3 font-medium text-white backdrop-blur-sm hover:bg-white/20 transition">
                Se våra behandlingar
            </a>
        </div>
    </div>
</section>

<section id="treatments" class="mx-auto max-w-7xl px-6 py-20">
    <h2 class="text-3xl font-semibold">
        Våra behandlingar
    </h2>

    <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($treatments as $treatment)
        <!-- Ändring: h-full, flex och flex-col gör att kortet kan styra höjden på sitt innehåll -->
        <article class="flex flex-col h-full rounded-2xl border border-stone-200 bg-white p-6 shadow-sm">
            <h3 class="text-xl font-semibold">
                {{ $treatment->name }}
            </h3>
            <hr class="my-4 border-stone-300">
            <!-- Ändring: flex-grow gör att texten tar upp allt tillgängligt utrymme så att priset trycks ner -->
            <p class="mt-3 text-stone-600 flex-grow">
                {{ $treatment->description }}
            </p>

            <p class="mt-4 text-sm text-stone-500">
                Behandlingstid: {{ $treatment->duration_minutes }} minuter
            </p>
            <hr class="my-4 border-stone-300">
            <!-- Ändring: mt-auto tvingar ner priset till botten så att alla priser linjerar perfekt -->
            <p class="mt-auto pt-2 text-2xl font-semibold">
                {{ number_format($treatment->price/100, 0, ',', ' ') }} kr
            </p>
        </article>
        @endforeach
    </div>
</section>

@endsection