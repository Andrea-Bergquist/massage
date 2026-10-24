@extends('layouts.app')

@section('title', 'Thai Serenity | Balans för kropp och själ')

@section('content')
<section class="bg-emerald-950 text-white">
    <div class="mx-auto max-w-7xl px-6 py-24">
        <p class="mb-4 text-sm uppercase tracking-[0.25em]
                      text-emerald-200">
            Traditionell thaimassage
        </p>

        <h1 class="max-w-2xl text-4xl font-semibold
                       leading-tight md:text-6xl">
            Balans för kropp och själ
        </h1>

        <p class="mt-6 max-w-xl text-stone-300">
            Upplev äkta thailändsk massage i en lugn
            och harmonisk miljö.
        </p>

        <a href="#treatments"
            class="mt-8 inline-flex rounded-lg bg-white
                      px-6 py-3 font-medium text-emerald-950">
            Se våra behandlingar
        </a>
    </div>
</section>

<section id="treatments"
    class="mx-auto max-w-7xl px-6 py-20">
    <h2 class="text-3xl font-semibold">
        Våra behandlingar
    </h2>

    <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($treatments as $treatment)
        <article class="rounded-2xl border border-stone-200
                                bg-white p-6 shadow-sm">
            <h3 class="text-xl font-semibold">
                {{ $treatment->name }}
            </h3>

            <p class="mt-3 text-stone-600">
                {{ $treatment->description }}
            </p>

            <p class="mt-4 text-sm text-stone-500">
                {{ $treatment->duration_minutes }} minuter
            </p>

            <p class="mt-2 text-2xl font-semibold">
                {{ number_format($treatment->price, 0, ',', ' ') }} kr
            </p>
        </article>
        @endforeach
    </div>
</section>
@endsection