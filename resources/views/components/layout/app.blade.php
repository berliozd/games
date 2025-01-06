<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    @vite(['resources/js/app.js'])

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
<div class="p-8 flex flex-col sm:justify-center items-center w-3/4 mx-auto rounded-lg border m-4 text-xl">
    {{ $slot }}
</div>
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
    {{--    <button class="active">--}}
    {{--        <svg--}}
    {{--                xmlns="http://www.w3.org/2000/svg"--}}
    {{--                class="h-5 w-5"--}}
    {{--                fill="none"--}}
    {{--                viewBox="0 0 24 24"--}}
    {{--                stroke="currentColor">--}}
    {{--            <path--}}
    {{--                    stroke-linecap="round"--}}
    {{--                    stroke-linejoin="round"--}}
    {{--                    stroke-width="2"--}}
    {{--                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>--}}
    {{--        </svg>--}}
    {{--    </button>--}}
    {{--    <button>--}}
    {{--        <svg--}}
    {{--                xmlns="http://www.w3.org/2000/svg"--}}
    {{--                class="h-5 w-5"--}}
    {{--                fill="none"--}}
    {{--                viewBox="0 0 24 24"--}}
    {{--                stroke="currentColor">--}}
    {{--            <path--}}
    {{--                    stroke-linecap="round"--}}
    {{--                    stroke-linejoin="round"--}}
    {{--                    stroke-width="2"--}}
    {{--                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>--}}
    {{--        </svg>--}}
    {{--    </button>--}}
</div>
</body>
</html>
