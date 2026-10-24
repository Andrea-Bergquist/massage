<nav
    x-data="{ open: false }"
    class="relative z-50 border-b border-stone-200 bg-white">
    <div class="mx-auto flex max-w-7xl
                items-center justify-between px-6 py-4">

        <a href="{{ route('home') }}"
            class="text-xl font-semibold tracking-tight">
            Thai Serenity
        </a>

        <div class="hidden items-center gap-8 md:flex">
            <a href="{{ route('home') }}">Hem</a>
            <a href="{{ route('treatments.index') }}">
                Behandlingar
            </a>
            <a href="#about">Om oss</a>
            <a href="#contact">Kontakt</a>
        </div>

        <button
            type="button"
            @click="open = !open"
            :aria-expanded="open.toString()"
            aria-label="Öppna eller stäng menyn"
            class="rounded-lg border border-stone-200 p-2 md:hidden">
            <span x-show="!open">☰</span>
            <span x-cloak x-show="open">✕</span>
        </button>
    </div>

    <div
        x-cloak
        x-show="open"
        x-transition
        @click.outside="open = false"
        class="absolute inset-x-0 top-full border-b
               border-stone-200 bg-white p-6 md:hidden">
        <div class="flex flex-col gap-5">
            <a @click="open = false" href="{{ route('home') }}">
                Hem
            </a>
            <a @click="open = false"
                href="{{ route('treatments.index') }}">
                Behandlingar
            </a>
            <a @click="open = false" href="#about">Om oss</a>
            <a @click="open = false" href="#contact">Kontakt</a>
        </div>
    </div>
</nav>