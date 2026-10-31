<nav x-data="{ open: false }" class="absolute left-0 right-0 top-0 z-50 bg-gradient-to-r from-emerald-950 via-emerald-950/40 to-transparent text-white">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">

        <!-- Logotyp -->
        <a href="{{ route('home') }}" class="text-xl font-semibold tracking-tight text-white hover:opacity-90 transition">
            Thai Serenity
        </a>

        <!-- Desktopmeny -->
        <div class="hidden items-center gap-8 md:flex text-sm font-medium">
            <!-- Hem -->
            <a href="{{ route('home') }}"
                class="pb-1 transition border-b-2 {{ Route::is('home') ? 'border-emerald-400 text-white font-semibold' : 'border-transparent text-stone-200 hover:text-white hover:border-stone-400' }}">
                Hem
            </a>

            <!-- Om oss -->
            <a href="{{ route('about') }}"
                class="pb-1 transition border-b-2 border-transparent text-stone-200 hover:text-white hover:border-stone-400">
                Om oss
            </a>

            <!-- Kontakt -->
            <a href="{{ route('contact') }}"
                class="pb-1 transition border-b-2 {{ Route::is('contact') ? 'border-emerald-400 text-white font-semibold' : 'border-transparent text-stone-200 hover:text-white hover:border-stone-400' }}">
                Kontakt
            </a>

            <!-- Autentiseringslänkar (Inloggad / Gäst) -->
            @auth
            <!-- Admin-länk (om användaren är admin) -->
            @if(Auth::user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}"
                class="pb-1 transition border-b-2 {{ Route::is('admin.*') ? 'border-emerald-400 text-white font-semibold' : 'border-transparent text-stone-200 hover:text-white hover:border-stone-400' }}">
                Admin Panel
            </a>
            @else
            <!-- Vanlig Dashboard-länk -->
            <a href="{{ route('dashboard') }}"
                class="pb-1 transition border-b-2 {{ Route::is('dashboard') ? 'border-emerald-400 text-white font-semibold' : 'border-transparent text-stone-200 hover:text-white hover:border-stone-400' }}">
                Min Sida
            </a>
            @endif

            <!-- Logga ut (Skickas via ett dolt formulär för säkerhet) -->
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="pb-1 transition border-b-2 border-transparent text-stone-200 hover:text-white hover:border-stone-400 cursor-pointer">
                    Logga ut
                </button>
            </form>
            @else
            <!-- Logga in (Visas endast om användaren är gäst) -->
            <a href="{{ route('login') }}"
                class="pb-1 transition border-b-2 {{ Route::is('login') ? 'border-emerald-400 text-white font-semibold' : 'border-transparent text-stone-200 hover:text-white hover:border-stone-400' }}">
                Logga in
            </a>
            @endauth
        </div>


        <!-- Mobilknapp -->
        <button type="button" @click="open = !open" :aria-expanded="open.toString()" aria-label="Öppna eller stäng menyn" class="rounded-lg border border-white/20 p-2 md:hidden hover:bg-white/10 transition">
            <span x-show="!open">☰</span>
            <span x-cloak x-show="open">✕</span>
        </button>
    </div>

    <!-- Mobilmeny -->
    <div x-cloak
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        @click.outside="open = false"
        class="absolute inset-x-0 top-full bg-emerald-950 p-6 md:hidden shadow-xl border-t border-emerald-900">
        <div class="flex flex-col gap-4 text-base font-medium">

            <!-- Hem -->
            <a @click="open = false" href="{{ route('home') }}"
                class="px-3 py-2 rounded-lg transition {{ Route::is('home') ? 'bg-emerald-800 text-white font-semibold' : 'text-stone-200 hover:bg-emerald-900 hover:text-white' }}">
                Hem
            </a>

            <!-- Om oss -->
            <a @click="open = false" href="{{ route('about') }}"
                class="px-3 py-2 rounded-lg text-stone-200 hover:bg-emerald-900 hover:text-white transition">
                Om oss
            </a>

            <!-- Kontakt -->
            <a @click="open = false" href="{{ route('contact') }}"
                class="px-3 py-2 rounded-lg transition {{ Route::is('contact') ? 'bg-emerald-800 text-white font-semibold' : 'text-stone-200 hover:bg-emerald-900 hover:text-white' }}">
                Kontakt
            </a>

            <div class="my-1 border-t border-emerald-900"></div>

            <!-- Mobil Autentisering -->
            @auth
            @if(Auth::user()->role === 'admin')
            <a @click="open = false" href="{{ route('admin.dashboard') }}"
                class="px-3 py-2 rounded-lg transition {{ Route::is('admin.*') ? 'bg-emerald-800 text-white font-semibold' : 'text-stone-200 hover:bg-emerald-900 hover:text-white' }}">
                Admin Panel
            </a>
            @else
            <a @click="open = false" href="{{ route('dashboard') }}"
                class="px-3 py-2 rounded-lg transition {{ Route::is('dashboard') ? 'bg-emerald-800 text-white font-semibold' : 'text-stone-200 hover:bg-emerald-900 hover:text-white' }}">
                Min Sida
            </a>
            @endif

            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit" @click="open = false" class="w-full text-left px-3 py-2 rounded-lg text-stone-200 hover:bg-emerald-900 hover:text-white transition cursor-pointer">
                    Logga ut
                </button>
            </form>
            @else
            <a @click="open = false" href="{{ route('login') }}"
                class="px-3 py-2 rounded-lg transition {{ Route::is('login') ? 'bg-emerald-800 text-white font-semibold' : 'text-stone-200 hover:bg-emerald-900 hover:text-white' }}">
                Logga in
            </a>
            @endauth
        </div>
    </div>
</nav>