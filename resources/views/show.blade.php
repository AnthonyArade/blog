<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">

    <x-publicNav />
    <main class="container mx-auto px-4 py-8">
        <x-fil-ariane :article="$article" />
        <div class="lg:flex gap-8">
            <!-- Blog Post Content -->
            <div class="lg:w-2/3">
                <x-article :article="$article" :comments="$comments" />
                <x-comment-area :comments="$comments" />
            </div>
            <x-author-detail :article="$article" />
        </div>
    </main>
    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>
