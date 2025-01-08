<x-layout.app>
    <x-slot:title>{{$game->name}}</x-slot>
    <x-slot:description>{{$game->description}}</x-slot>

    <input type="hidden" id="hiddenScore" value="0">

    <div class="rounded-lg border p-8 flex flex-col sm:justify-center items-center w-3/4 mx-auto m-4 text-xl">
        {!! $game->content !!}
    </div>
    <div class="w-3/4 mx-auto text-xl">
        <style>
            .share-buttons {
                display: none; /* Hidden by default */
            }
        </style>

        <div class="share-buttons flex flex-col gap-2 md:flex-row justify-between">
            <button id="share-x" class="flex rounded bg-gray-600 p-4 cursor-pointer justify-center text-white">Share on X</button>
            <button id="share-telegram" class="flex rounded bg-gray-600 p-4 cursor-pointer justify-center text-white">Share on Telegram</button>
            <button id="share-whatsapp" class="flex rounded bg-gray-600 p-4 cursor-pointer justify-center text-white">Share on WhatsApp</button>
            <button id="share-facebook" class="flex rounded bg-gray-600 p-4 cursor-pointer justify-center text-white">Share on Facebook</button>
        </div>
        <script>
            function shareScore(platform) {
                const url = 'https://games.addeos.com/g/{{$game->slug}}';
                const text = `I just scored ${hiddenScore.value} points in the {{$game->name}}! How far can you go? Check out the game here: ${url}`;

                let shareLink = '';
                switch (platform) {
                    case 'facebook':
                    case 'telegram':
                        shareLink = platform === 'facebook'
                            ? `https://www.facebook.com/sharer/sharer.php?href=${encodeURIComponent(url)}&quote=${encodeURIComponent(
                                text)}`
                            : `https://t.me/share/url?url=${encodeURIComponent(url)}&text=${encodeURIComponent(text)}`;
                        break;
                    case 'whatsapp':
                        shareLink = `https://api.whatsapp.com/send?text=${encodeURIComponent(text)}`;
                        break;
                    case 'x':
                        // Share URL for X (formerly Twitter)
                        shareLink = `https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}`;
                        break;
                    default:
                        return;
                }

                window.open(shareLink, '_blank');
            }

            document.getElementById('share-x').addEventListener('click', () => shareScore('x'));
            document.getElementById('share-telegram').addEventListener('click', () => shareScore('telegram'));
            document.getElementById('share-whatsapp').addEventListener('click', () => shareScore('whatsapp'));
            document.getElementById('share-facebook').addEventListener('click', () => shareScore('facebook'));
        </script>

        {{$game->description}}
    </div>
</x-layout.app>
