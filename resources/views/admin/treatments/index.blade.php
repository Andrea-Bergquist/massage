@extends('layouts.app')

@section('title', 'Thai Serenity | Hantera Priser & Utbud')

@section('content')

<!-- Header i Thai Serenity-stil -->
<div class="bg-gradient-to-r from-emerald-950 to-emerald-900 shadow-md py-12">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 pt-6">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.25em] text-emerald-300 mb-1">
                    Administrationspanel
                </p>
                <h2 class="font-semibold text-2xl text-white leading-tight">
                    Hantera priser & utbud
                </h2>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 text-sm font-medium text-emerald-200 hover:text-white transition">
                <span>&larr;</span> Tillbaka till instrumentpanelen
            </a>
        </div>
    </div>
</div>

<div class="py-12 bg-stone-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-6 space-y-8">

        <!-- Statusmeddelanden (Success / Error) -->
        @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-2xl shadow-sm flex items-center gap-3">
            <svg class="h-5 w-5 text-emerald-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <p class="text-sm font-medium">{{ session('success') }}</p>
        </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">

            <!-- VÄNSTER: Skapa ny behandling (Formulär) -->
            <div class="bg-white border border-stone-200 p-6 rounded-2xl shadow-sm lg:col-span-1 sticky top-24">
                <h3 class="text-lg font-semibold text-stone-900 mb-1">Lägg till ny behandling</h3>
                <p class="text-xs text-stone-500 mb-6">Skapa en ny thaimassage eller tjänst i prislistan.</p>

                <form action="{{ route('admin.treatments.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-stone-700 mb-1">Behandlingens namn</label>
                        <input type="text" name="name" id="name" required placeholder="t.ex. Traditionell Thaimassage"
                            class="w-full rounded-xl border-stone-200 bg-stone-50/50 text-sm focus:border-emerald-500 focus:ring-emerald-500 transition px-4 py-2.5">
                    </div>

                    <div>
                        <label for="description" class="block text-xs font-semibold uppercase tracking-wider text-stone-700 mb-1">Beskrivning</label>
                        <textarea name="description" id="description" rows="3" placeholder="Beskriv behandlingen och dess fördelar..."
                            class="w-full rounded-xl border-stone-200 bg-stone-50/50 text-sm focus:border-emerald-500 focus:ring-emerald-500 transition px-4 py-2.5"></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="duration" class="block text-xs font-semibold uppercase tracking-wider text-stone-700 mb-1">Tid (minuter)</label>
                            <input type="number" name="duration_minutes" id="duration_minutes" required placeholder="60"
                                class="w-full rounded-xl border-stone-200 bg-stone-50/50 text-sm focus:border-emerald-500 focus:ring-emerald-500 transition px-4 py-2.5">
                        </div>
                        <div>
                            <label for="price" class="block text-xs font-semibold uppercase tracking-wider text-stone-700 mb-1">Pris (SEK)</label>
                            <input type="number" name="price" id="price" required placeholder="650"
                                class="w-full rounded-xl border-stone-200 bg-stone-50/50 text-sm focus:border-emerald-500 focus:ring-emerald-500 transition px-4 py-2.5">
                        </div>
                    </div>

                    <button type="submit" class="w-full mt-2 bg-emerald-950 text-white text-sm font-semibold py-3 px-4 rounded-xl hover:bg-emerald-900 transition shadow-sm cursor-pointer">
                        Spara behandling
                    </button>
                </form>
            </div>

            <!-- HÖGER: Befintlig prislista (Uppdatera / Radera) -->
            <div class="lg:col-span-2 space-y-4">
                <div class="flex items-center justify-between mb-2">
                    <div>
                        <h3 class="text-lg font-semibold text-stone-900">Aktuella priser & behandlingar</h3>
                        <p class="text-xs text-stone-500">Justera värden direkt i fälten och spara, eller ta bort gamla alternativ.</p>
                    </div>
                    <span class="text-xs font-medium bg-emerald-50 text-emerald-800 px-2.5 py-1 rounded-full border border-emerald-100">
                        {{ $treatments->count() }} Behandlingar
                    </span>
                </div>

                @foreach($treatments as $treatment)
                <div class="bg-white border border-stone-200 p-6 rounded-2xl shadow-sm transition hover:border-stone-300">

                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-start">

                        <!-- Uppdateringsformulär (Täcker fälten och Uppdatera-knappen) -->
                        <form action="{{ route('admin.treatments.update', $treatment->id) }}" method="POST" class="md:col-span-10 grid grid-cols-1 md:grid-cols-12 gap-4 items-start m-0">
                            @csrf
                            @method('PUT')

                            <!-- Namn & Beskrivning -->
                            <div class="md:col-span-7 space-y-3">
                                <input type="text" name="name" value="{{ $treatment->name }}"
                                    class="w-full font-semibold text-stone-900 border-transparent hover:border-stone-200 focus:border-emerald-500 focus:ring-emerald-500 rounded-xl bg-transparent focus:bg-stone-50 px-3 py-1 transition text-base">

                                <textarea name="description" rows="2"
                                    class="w-full text-sm text-stone-500 border-transparent hover:border-stone-200 focus:border-emerald-500 focus:ring-emerald-500 rounded-xl bg-transparent focus:bg-stone-50 px-3 py-1 transition resize-none">{{ $treatment->description }}</textarea>
                            </div>

                            <!-- Tid & Pris -->
                            <div class="md:col-span-5 grid grid-cols-2 gap-2">
                                <div>
                                    <label class="block text-[10px] font-bold uppercase tracking-wider text-stone-400 mb-1 pl-3">Tid (min)</label>
                                    <input type="number" name="duration_minutes" value="{{ $treatment->duration_minutes }}"
                                        class="w-full text-sm text-stone-800 font-medium bg-stone-50 border-stone-200 focus:border-emerald-500 focus:ring-emerald-500 rounded-xl px-3 py-2 transition">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold uppercase tracking-wider text-stone-400 mb-1 pl-3">Pris (kr)</label>
                                    <input type="number" name="price" value="{{ $treatment->price/100 }}"
                                        class="w-full text-sm text-emerald-800 font-semibold bg-stone-50 border-stone-200 focus:border-emerald-500 focus:ring-emerald-500 rounded-xl px-3 py-2 transition">
                                </div>
                            </div>

                            <button type="submit" class="hidden"></button>
                        </form>

                        <!-- Åtgärdsknappar -->
                        <div class="md:col-span-2 flex md:flex-col justify-end gap-2 pt-4 md:pt-0 h-full">

                            <button type="submit" onclick="event.preventDefault(); this.closest('.grid').querySelector('form').submit();" class="flex-1 md:w-full inline-flex justify-center items-center px-3 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold rounded-xl transition cursor-pointer" title="Spara ändringar">
                                Uppdatera
                            </button>

                            <!-- Radera-formulär -->
                            <form action="{{ route('admin.treatments.destroy', $treatment->id) }}" method="POST" class="flex-1 md:w-full m-0" onsubmit="return confirm('Är du säker på att du vill radera denna behandling?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full inline-flex justify-center items-center px-3 py-2 border border-red-200 hover:bg-red-50 text-red-600 text-xs font-medium rounded-xl transition cursor-pointer" title="Radera behandling">
                                    Radera
                                </button>
                            </form>

                        </div>
                    </div>

                </div>
                @endforeach

            </div>
        </div>

    </div>
</div>

@endsection