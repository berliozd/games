<script setup>
import {Head, usePage} from '@inertiajs/vue3';
import Game from "@/Pages/Welcome/Partials/Game.vue";

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
                        class="flex lg:justify-center lg:col-start-2 rounded-lg p-3 sm:shadow-none shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-black/10 bg-white  sm:ring-0">
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

                        <div v-for="game in games"
                             class="flex gap-4 rounded-lg shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-black/10 hover:ring-black/50 bg-white">
                            <Game :game="game"/>
                        </div>
                    </div>

                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                </footer>
            </div>
        </div>
    </div>
</template>
