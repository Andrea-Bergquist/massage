@extends('layouts.app')

@section('title', 'Kontakt | Thai Serenity')

@section('content')

<form method="POST" action="{{ route('contact.store') }}"
    class="space-y-5">
    @csrf

    <div>
        <label for="name">Namn</label>
        <input id="name" name="name" required
            autocomplete="name"
            class="mt-1 w-full rounded-lg border p-3">
    </div>

    <div>
        <label for="email">E-post</label>
        <input id="email" name="email" type="email" required
            autocomplete="email"
            class="mt-1 w-full rounded-lg border p-3">
    </div>

    <div>
        <label for="message">Meddelande</label>
        <textarea id="message" name="message"
            rows="5" required
            class="mt-1 w-full rounded-lg border p-3"></textarea>
    </div>

    {{-- Honeypot: riktiga besökare ska lämna fältet tomt. --}}
    <div aria-hidden="true"
        class="absolute left-[-10000px] top-auto
                h-px w-px overflow-hidden">
        <label for="website">Lämna detta fält tomt</label>
        <input id="website" name="website" type="text"
            tabindex="-1" autocomplete="off">
    </div>

    <button type="submit"
        class="rounded-lg bg-emerald-900 px-6 py-3
                   font-medium text-white">
        Skicka meddelande
    </button>
</form>

@endsection