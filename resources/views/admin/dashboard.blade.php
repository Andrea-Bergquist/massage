@extends('layouts.app')

@section('title', 'Thai Serenity | Admin Dashboard')

@section('content')

<!-- Header i Thai Serenity-stil -->
<div class="bg-gradient-to-r from-emerald-950 to-emerald-900 shadow-md py-12">
    <div class="max-w-7xl mx-auto">
        <p class="text-xs font-semibold uppercase tracking-[0.25em] text-emerald-300 mb-1 pt-6">
            Administrationspanel
        </p>
        <h2 class="font-semibold text-2xl text-white leading-tight pt-6">
            Välkommen tillbaka, {{ Auth::user()->name }}
        </h2>
    </div>
</div>

<div class="py-12 bg-stone-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-6 space-y-6">

        <!-- Huvudkort: Statusmeddelande -->
        <div class="bg-white overflow-hidden shadow-sm border border-stone-200 rounded-2xl">
            <div class="p-6 text-stone-800 flex items-center gap-4">
                <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-emerald-50 text-emerald-700">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
                <div>
                    <p class="font-medium text-stone-900">Inloggningen lyckades</p>
                    <p class="text-sm text-stone-500">Du är nu säkert inloggad som administratör för Thai Serenity.</p>
                </div>
            </div>
        </div>

        <!-- Snabbknappar / Genvägar -->
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

            <!-- Hantera Behandlingar -->
            <div class="bg-white border border-stone-200 p-6 rounded-2xl shadow-sm flex flex-col justify-between">
                <div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-emerald-50 text-emerald-700 mb-4">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-stone-900">Behandlingar</h3>
                    <p class="text-sm text-stone-500 mt-1">Lägg till nya thaimassager, ändra priser eller justera behandlingstider.</p>
                </div>
                <div class="mt-6">
                    <a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-600 hover:text-emerald-700 transition">
                        Hantera priser & utbud
                        <span>&rarr;</span>
                    </a>
                </div>
            </div>

            <!-- Hantera Bokningar -->
            <div class="bg-white border border-stone-200 p-6 rounded-2xl shadow-sm flex flex-col justify-between">
                <div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-emerald-50 text-emerald-700 mb-4">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-stone-900">Bokningar</h3>
                    <p class="text-sm text-stone-500 mt-1">Se inkommande bokningar från kunder och hantera ditt schema.</p>
                </div>
                <div class="mt-6">
                    <a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-600 hover:text-emerald-700 transition">
                        Visa kalender
                        <span>&rarr;</span>
                    </a>
                </div>
            </div>

            <!-- Kundmeddelanden -->
            <div class="bg-white border border-stone-200 p-6 rounded-2xl shadow-sm flex flex-col justify-between">
                <div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-emerald-50 text-emerald-700 mb-4">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-stone-900">Kontaktmeddelanden</h3>
                    <p class="text-sm text-stone-500 mt-1">Läsa och hantera meddelanden som skickats via kontaktformuläret.</p>
                </div>
                <div class="mt-6">
                    <a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-600 hover:text-emerald-700 transition">
                        Öppna inkorg
                        <span>&rarr;</span>
                    </a>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection