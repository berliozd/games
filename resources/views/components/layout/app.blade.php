<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    @vite(['resources/js/app.js'])
    <meta name="description" content="{{ $description }}">
</head>
<body class="font-sans antialiased">
<div class="navbar bg-base-100">
    <div class="flex-1">
        <a class="" href="/">
            <div class="rounded-lg shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-black/10 bg-white sm:w-1/5 w-1/2">
                <img src="/img/games-addeos-logo.png"
                     alt="Games addeos : Simple Games, Endless Fun – Play, Compete, Share!">
            </div>
        </a>
    </div>
</div>
{{ $slot }}
<div class="btm-nav">
    <a href="/">
        <button>
            <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
        </button>
    </a>
</div>
</body>
</html>
