<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Thai Serenity')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-stone-50 text-stone-800 antialiased">

    @include('components.navbar')

    <main>
        @yield('content')
    </main>

    <footer class="bg-emerald-950 text-white">
        <div class="mx-auto max-w-7xl px-6 py-10">
            <p class="text-sm text-stone-300">
                © {{ date('Y') }} Thai Serenity
            </p>
        </div>
    </footer>

</body>

</html>