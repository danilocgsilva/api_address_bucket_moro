<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Laravel')</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-100">
    @include('partials.nav')

    <main class="max-w-4xl mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">@yield('title', 'Laravel')</h1>

        <article class="prose prose-lg max-w-none">
            @yield('content')
        </article>
    </main>

    @include('partials.footer')

    <script>
        const btn = document.querySelector("button.mobile-menu-button");
        const menu = document.querySelector(".mobile-menu");

        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
    </script>

    @vite(['resources/js/app.js'])
</body>

</html>