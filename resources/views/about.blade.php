@extends('layouts.app')

@section('title', 'Om oss | Thai Serenity')

@section('about')

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
            Om oss
        </p>
        <h1 class="max-w-2xl text-3xl font-semibold leading-tight md:text-5xl">
            Thai serienity är en plats där kropp och själ möts i harmoni.
        </h1>
    </div>
</section>

<!-- Berättelsen om oss -->
<section class="mx-auto max-w-7xl px-6 py-20">
    <div class="grid gap-12 lg:grid-cols-2 items-center">
        <div>
            <h2 class="text-3xl font-semibold text-stone-900">
                En tradition av välmående
            </h2>
            <p class="mt-6 text-stone-600 leading-relaxed">
                Thai Serenity grundades med en vision om att föra den urgamla thailändska massagetraditionen till staden. För oss är thaimassage inte bara en behandling – det är en helande konstform som har praktiserats i århundraden för att frigöra blockerad energi och återställa kroppens naturliga balans.
            </p>
            <p class="mt-4 text-stone-600 leading-relaxed">
                Alla våra terapeuter är djupt engagerade i ditt välmående och anpassar varje tryck, stretch och rörelse efter dina unika behov. Vi tror på att skapa en långsiktig relation till hälsa, där du kan lämna vardagens stress utanför dörren.
            </p>
        </div>

        <!-- Sekundär bild för att lyfta sidan visuellt -->
        <div class="relative h-[350px] overflow-hidden rounded-2xl border border-stone-200 shadow-sm">
            <img src="{{ asset('images/about_hero.jpeg') }}" alt="Vår harmoniska miljö" class="h-full w-full object-cover" />
        </div>
    </div>
</section>

<!-- Våra kärnvärden (Samma stil som USP-boxarna på startsidan) -->
<section class="bg-stone-50 py-16 border-y border-stone-200">
    <div class="mx-auto max-w-7xl px-6">
        <h3 class="text-2xl font-semibold text-stone-900 text-center mb-10">
            Vad vi står för
        </h3>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Autenticitet -->
            <div class="rounded-2xl border border-stone-200 bg-white p-6 shadow-sm">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-emerald-50 text-emerald-700 mb-4">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h4 class="font-semibold text-stone-900 text-lg">Äkta tradition</h4>
                <p class="text-sm text-stone-600 mt-2">Vi bevarar och respekterar de klassiska thailändska massageteknikerna i varje rörelse.</p>
            </div>

            <!-- Kvalitet -->
            <div class="rounded-2xl border border-stone-200 bg-white p-6 shadow-sm">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-emerald-50 text-emerald-700 mb-4">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499c.172-.436.745-.436.92 0l2.18 4.434 4.893.712c.48.069.672.65.326 1.005l-3.54 3.453.836 4.872c.082.479-.42.845-.852.618L12 18.257l-4.383 2.304c-.433.228-.934-.138-.852-.618l.836-4.872-3.54-3.453c-.346-.355-.154-.936.326-1.005l4.893-.712 2.18-4.434Z" />
                    </svg>
                </div>
                <h4 class="font-semibold text-stone-900 text-lg">Högsta kvalitet</h4>
                <p class="text-sm text-stone-600 mt-2">Från våra ekologiska oljor till våra certifierade terapeuter kompromissar vi aldrig med din upplevelse.</p>
            </div>

            <!-- Harmoni -->
            <div class="rounded-2xl border border-stone-200 bg-white p-6 shadow-sm sm:col-span-2 lg:col-span-1">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-emerald-50 text-emerald-700 mb-4">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h4 class="font-semibold text-stone-900 text-lg">Total harmoni</h4>
                <p class="text-sm text-stone-600 mt-2">Vi skapar en fristad där både kroppsliga spänningar och mental stress får chansen att släppa.</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to action längst ner -->
<section class="mx-auto max-w-7xl px-6 py-20 text-center">
    <h3 class="text-2xl font-semibold text-stone-900">Redo att hitta din balans?</h3>
    <p class="mt-3 text-stone-600 max-w-md mx-auto">Låt oss ta hand om dig. Boka en tid online på bara några minuter.</p>
    <div class="mt-8">
        <a href="{{ url('/#booking') }}" class="inline-flex items-center gap-2 rounded-full bg-emerald-600 px-6 py-3 font-medium text-white hover:bg-emerald-700 transition">
            Boka en behandling
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
            </svg>
        </a>
    </div>
</section>

@endsection