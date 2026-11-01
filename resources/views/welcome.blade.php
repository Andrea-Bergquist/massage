@extends('layouts.app')

@section('title', 'Thai Serenity | Balans för kropp och själ')

@section('content')

<section class="relative bg-emerald-950 text-white min-h-[600px] flex items-center overflow-hidden">
    <!-- Bakgrundsbild -->
    <img src="{{ asset('images/hero_1.jpeg') }}" alt="Thaimassage hero" class="absolute inset-0 h-full w-full object-cover object-center" />
    <!-- Mörkt overlay för att göra texten läsbar (ca 60% opacitet) -->
    <div class="absolute inset-0 bg-emerald-950/60 mix-blend-multiply"></div>
    <!-- Innehåll (Placeras ovanpå bilden med z-10) -->
    <div class="relative z-10 mx-auto max-w-7xl px-6 py-24 w-full">
        <p class="mb-4 text-sm font-semibold uppercase tracking-[0.25em] text-emerald-200"> Traditionell thaimassage </p>
        <h1 class="max-w-2xl text-4xl font-semibold leading-tight md:text-6xl"> Balans för kropp och själ </h1>
        <p class="mt-6 max-w-xl text-stone-200 text-lg"> Upplev äkta thailändsk massage i en lugn och harmonisk miljö. Vi hjälper dig att slappna av, minska stress och återfå din energi. </p>
        <!-- Knappar enligt skissen -->
        <div class="mt-10 flex flex-wrap gap-4">
            <a href="#booking" class="inline-flex items-center gap-2 rounded-full bg-emerald-600 px-6 py-3 font-medium text-white hover:bg-emerald-700 transition"> Boka din behandling <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg> </a>
            <a href="#treatments" class="inline-flex rounded-full border border-white/40 bg-white/10 px-6 py-3 font-medium text-white backdrop-blur-sm hover:bg-white/20 transition"> Se våra behandlingar </a>
        </div>
    </div>
</section>

<!-- ================= NY USP / FEATURE SEKTION ================= -->
<section class="relative z-20 mx-auto max-w-7xl px-6 -mt-12 md:-mt-16">
    <div class="grid gap-6 rounded-2xl border border-stone-200 bg-white p-6 shadow-md sm:grid-cols-2 lg:grid-cols-4">
        <!-- Erfarna terapeuter -->
        <div class="flex items-center space-x-4 p-2">
            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-emerald-50 text-emerald-700">
                <!-- Användar/Terapeut-ikon -->
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
            </div>
            <div>
                <h4 class="font-semibold text-stone-900 text-sm">Erfarna terapeuter</h4>
                <p class="text-xs text-stone-500 mt-0.5">Utbildade och certifierade</p>
            </div>
        </div>
        <!-- Naturliga oljor -->
        <div class="flex items-center space-x-4 p-2">
            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-emerald-50 text-emerald-700">
                <!-- Droppe/Olja-ikon -->
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12 16.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9Z" />
                </svg>
            </div>
            <div>
                <h4 class="font-semibold text-stone-900 text-sm">Naturliga oljor</h4>
                <p class="text-xs text-stone-500 mt-0.5">För en better upplevelse</p>
            </div>
        </div>
        <!-- Lugn miljö -->
        <div class="flex items-center space-x-4 p-2">
            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-emerald-50 text-emerald-700">
                <!-- Lotus/Växt/Miljö-ikon -->
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18M3 12h18M5.25 5.25l13.5 13.5M5.25 18.75L18.75 5.25" />
                </svg>
            </div>
            <div>
                <h4 class="font-semibold text-stone-900 text-sm">Lugn miljö</h4>
                <p class="text-xs text-stone-500 mt-0.5">En oas mitt i staden</p>
            </div>
        </div>
        <!-- Boka enkelt -->
        <div class="flex items-center space-x-4 p-2">
            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-emerald-50 text-emerald-700">
                <!-- Kalender-ikon -->
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                </svg>
            </div>
            <div>
                <h4 class="font-semibold text-stone-900 text-sm">Boka enkelt</h4>
                <p class="text-xs text-stone-500 mt-0.5">Online eller på plats</p>
            </div>
        </div>
    </div>
</section>

<!-- ================= BEHANDLINGAR ================= -->
<section id="treatments" class="mx-auto max-w-7xl px-6 py-20">
    <h2 class="text-3xl font-semibold text-stone-900"> Våra behandlingar </h2>
    <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($treatments as $treatment)
        <article class="flex flex-col h-full rounded-2xl border border-stone-200 bg-white p-6 shadow-sm">
            <h3 class="text-xl font-semibold text-stone-900"> {{ $treatment->name }} </h3>
            <hr class="my-4 border-stone-300">
            <p class="mt-3 text-stone-600 flex-grow"> {{ $treatment->description }} </p>
            <p class="mt-4 text-sm text-stone-500"> Behandlingstid: {{ $treatment->duration_minutes }} minuter </p>
            <hr class="my-4 border-stone-300">
            <p class="mt-auto pt-2 text-2xl font-semibold text-stone-900"> {{ number_format($treatment->price/100, 0, ',', ' ') }} kr </p>
        </article>
        @endforeach
    </div>
</section>

<!-- ================= NY SEKTION: PRISLISTA (ÖVERBLICK) ================= -->
<section id="pricing" class="scroll-mt-20 bg-stone-50 py-20 border-y border-stone-200">
    <div class="mx-auto max-w-3xl px-6">
        <div class="text-center max-w-xl mx-auto mb-12">
            <h2 class="text-3xl font-semibold text-stone-900">Prisöversikt</h2>
            <p class="text-stone-600 mt-2">Här hittar du en enkel sammanställning av våra priser och behandlingstider.</p>
        </div>

        <div class="bg-white rounded-2xl border border-stone-200 shadow-sm overflow-hidden">
            <div class="divide-y divide-stone-200">
                @foreach ($treatments as $treatment)
                <div class="flex items-center justify-between p-5 hover:bg-stone-50/50 transition">
                    <div class="pr-4">
                        <h4 class="font-medium text-stone-900">{{ $treatment->name }}</h4>
                        <p class="text-xs text-stone-500 mt-0.5">{{ $treatment->duration_minutes }} minuter</p>
                    </div>
                    <div class="text-xl font-semibold text-emerald-800 whitespace-nowrap">
                        {{ number_format($treatment->price/100, 0, ',', ' ') }} kr
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- ================= NY SEKTION: BETALNINGSMETODER & FRISKVÅRD ================= -->
<section class="py-16 bg-white">
    <div class="mx-auto max-w-7xl px-6 text-center">
        <h3 class="text-sm font-semibold uppercase tracking-[0.25em] text-emerald-700">Betalning & Friskvård</h3>
        <p class="mt-2 text-xl text-stone-600">Vi tar emot de flesta betalkort och är anslutna till Epassi</p>

        <div class="mt-10 flex flex-wrap items-center justify-center gap-8 md:gap-12 opacity-80">
            <!-- Epassi -->
            <div class="flex flex-col items-center">
                <img src="{{ asset('images/epassi_logo.png') }}" alt="Epassi logo" class="w-16" />
                <span class="text-xs text-stone-400 mt-2">Friskvård</span>
            </div>

            <!-- Visa -->
            <div class="flex flex-col items-center">
                <span class="text-2xl font-bold italic text-blue-800 tracking-tight">VISA</span>
                <span class="text-xs text-stone-400 mt-2">Kortbetalning</span>
            </div>

            <!-- Mastercard -->
            <div class="flex flex-col items-center">
                <div class="flex items-center space-x-1">
                    <div class="h-6 w-6 rounded-full bg-red-500 opacity-90"></div>
                    <div class="h-6 w-6 rounded-full bg-amber-500 opacity-90 -ml-3"></div>
                    <span class="text-sm font-semibold text-stone-700 pl-1 hidden sm:inline">mastercard</span>
                </div>
                <span class="text-xs text-stone-400 mt-2">Kortbetalning</span>
            </div>

            <!-- Swish (Valfritt tillägg som ofta uppskattas i Sverige) -->
            <div class="flex flex-col items-center">
                <span class="text-2xl font-extrabold text-cyan-500 tracking-tight">swish</span>
                <span class="text-xs text-stone-400 mt-2">Mobilbetalning</span>
            </div>
        </div>
    </div>
</section>
@endsection