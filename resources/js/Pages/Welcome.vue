<script setup>
import {Head, usePage} from '@inertiajs/vue3';

const page = usePage();

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
    games: {
        type: Array,
        required: true
    }
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Welcome"/>
    <div class="">
        <img id="background" class="absolute -left-20 top-0 max-w-[877px]"
             src="https://laravel.com/assets/img/welcome/background.svg"/>
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div
                        class="flex lg:justify-center lg:col-start-2 rounded-lg p-6 sm:shadow-none shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-black/10 bg-white  sm:ring-0">
                        <img src="/img/games-addeos-logo.png"
                             alt="Games addeos : Simple Games, Endless Fun – Play, Compete, Share!">
                    </div>
                </header>

                <main class="mt-6">
                    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                        <div class="rounded-lg p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 transition duration-300 ring-black/10 hover:ring-black/50
                         md:row-span-3 lg:p-10 lg:pb-10 bg-white">
                            <div class="relative flex items-center gap-6 lg:items-end">
                                <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">
                                    <div class="pt-3 sm:pt-5 lg:pt-0 text-base">
                                        <h2 class="font-semibold">Welcome to {{ page.props.appName }}</h2>
                                        <p class="m-4">
                                            Step into a world of simple, fun, and engaging games designed to entertain
                                            and challenge you anytime, anywhere.
                                            <br>
                                            On our platform, every game is uniquely crafted with the help of artificial
                                            intelligence, combining creativity and innovation to provide an experience
                                            that’s accessible to everyone. Whether you want to sharpen your memory,
                                            boost your reflexes, or simply have a good time, you’ll find a collection of
                                            games for all ages and skill levels.
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div v-for="game in games"
                             class="flex gap-4 rounded-lg shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-black/10 hover:ring-black/50 bg-white">
                            <a :href="'/g/'+game.slug" class="flex items-start w-full p-6 ">

                                <div
                                    class="flex size-12 shrink-0 items-center justify-center rounded-full sm:size-16 ">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         width="272.000000pt" height="253.000000pt" viewBox="0 0 272.000000 253.000000"
                                         preserveAspectRatio="xMidYMid meet">
                                        <g transform="translate(0.000000,253.000000) scale(0.100000,-0.100000)"
                                           fill="#FF2D20" stroke="none">
                                            <path d="M1295 2331 c-16 -10 -46 -44 -65 -75 -80 -128 -123 -179 -185 -213
-36 -19 -74 -33 -95 -33 -19 0 -99 14 -178 31 -161 35 -199 33 -233 -9 -18
-23 -20 -35 -15 -85 3 -32 13 -86 22 -120 20 -74 21 -155 4 -217 -15 -58 -77
-118 -195 -190 -114 -71 -155 -112 -155 -157 0 -41 23 -65 131 -133 89 -56
151 -117 181 -178 18 -37 20 -55 15 -120 -3 -43 -15 -113 -26 -156 -27 -104
-28 -179 -1 -206 33 -33 66 -35 194 -6 67 14 138 26 160 26 107 0 173 -52 274
-217 68 -110 109 -153 147 -153 49 0 76 24 141 127 112 174 189 224 320 203
38 -6 104 -20 148 -30 109 -28 161 -26 191 4 37 37 39 65 14 163 -33 125 -33
241 1 308 22 44 39 59 135 121 61 39 132 92 159 118 44 41 48 49 42 78 -7 39
-49 79 -139 133 -85 52 -145 110 -173 170 -30 64 -30 83 5 253 35 171 31 218
-23 247 -32 18 -36 17 -132 -6 -64 -15 -129 -24 -184 -24 -75 0 -91 4 -138 30
-64 35 -116 95 -167 194 -47 89 -93 141 -126 141 -13 0 -37 -8 -54 -19z m190
-483 c208 -59 364 -209 434 -412 32 -95 40 -255 17 -347 -29 -117 -91 -225
-175 -309 -128 -127 -270 -185 -451 -184 -174 0 -329 64 -451 184 -109 108
-189 299 -189 455 0 152 70 323 180 439 169 177 402 241 635 174z"/>
                                        </g>
                                    </svg>

                                </div>
                                <div class="pt-3 sm:pt-5 w-full">

                                    <h2 class="text-xl font-semibold"><a :href="'/g/'+game.slug">{{
                                            game.name
                                        }}</a>
                                    </h2>
                                    <div class="flex justify-between w-full">
                                        <p class="mt-4 text-sm/relaxed">
                                            {{ game.description }}
                                        </p>
                                        <a :href="'/g/'+game.slug">
                                            <svg class="size-6 shrink-0 stroke-[#FF2D20]"
                                                 xmlns="http://www.w3.org/2000/svg"
                                                 fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="text-xs text-gray-400">
                                        Created on : {{ game.created_at }}
                                    </div>
                                </div>

                            </a>
                        </div>

                        <div class="rounded-lg p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 transition duration-300 ring-black/10 hover:ring-black/50
                         md:row-span-3 lg:p-10 lg:pb-10 bg-white">
                            <div class="relative flex items-center gap-6 lg:items-end">
                                <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">
                                    <div class="pt-3 sm:pt-5 lg:pt-0 text-base">
                                        <p class="font-bold">Why play on {{ page.props.appName }}?</p>
                                        <ul class="list-decimal px-4 italic m-2">
                                            <li><span class="font-extrabold">Diverse Challenges</span>: Improve your
                                                skills while having fun.
                                            </li>
                                            <li><span class="font-extrabold">Share Your Scores</span>: Compete with
                                                friends and share your achievements
                                                on your favorite social media platforms.
                                            </li>
                                            <li><span class="font-extrabold">Free & No Installation Needed</span>: Play
                                                directly from your browser,
                                                wherever you are.
                                            </li>

                                            <li><span class="font-extrabold">Simplicity</span>: Easy-to-learn games,
                                                ready to play with just one click.
                                            </li>
                                        </ul>
                                        <p class="my-4">Ready to take on the challenge? Explore our selection and start
                                            having fun today!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </footer>
            </div>
        </div>
    </div>
</template>
