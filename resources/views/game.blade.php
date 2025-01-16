<x-layout.app>
    <x-slot:title>{{$game->name}}</x-slot>
    <x-slot:description>{{$game->short_description}}</x-slot>
    <x-slot:url>{{getenv('APP_URL'). '/g/' .$game->slug}}</x-slot:url>

    <div class="bg-red-200 w-3/4 mx-auto">
        <script async
                src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-0882802698917065"
                crossorigin="anonymous"></script>
        <!-- Games game page -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-0882802698917065"
             data-ad-slot="1315227924"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
    <input type="hidden" id="hiddenScore" value="0">

    <div class="rounded-lg border-4 border-red-500 p-8 flex flex-col sm:justify-center items-center w-3/4 mx-auto m-4 text-xl">
        {!! $game->html !!}
        <style>{!! $game->css !!}</style>
        <script>{!! $game->js !!}</script>
    </div>


    <div class="w-3/4 mx-auto text-xl">
        <style>
            .share-buttons {
                display: none; /* Hidden by default */
            }

            code[class*=language-], pre[class*=language-] {
                font-size: small;
            }
        </style>

        <div class="share-buttons flex flex-col gap-2 md:flex-row justify-between">
            <button id="share-x" class="flex rounded bg-gray-600 p-4 cursor-pointer justify-center text-white">
                Share on X
            </button>
            <button id="share-reddit" class="flex rounded bg-gray-600 p-4 cursor-pointer justify-center text-white">
                Share on reddit
            </button>
            <button id="share-telegram" class="flex rounded bg-gray-600 p-4 cursor-pointer justify-center text-white">
                Share on Telegram
            </button>
            <button id="share-whatsapp" class="flex rounded bg-gray-600 p-4 cursor-pointer justify-center text-white">
                Share on WhatsApp
            </button>
            <button id="share-facebook" class="flex rounded bg-gray-600 p-4 cursor-pointer justify-center text-white">
                Share on Facebook
            </button>
        </div>
        <script>
            function shareScore(platform) {
                const url = 'https://games.addeos.com/g/{{$game->slug}}';
                const text = `I just scored ${hiddenScore.value} points in the {{$game->name}}! How far can you go? Check out the game here: ${url}`;

                let shareLink = '';
                switch (platform) {
                    case 'facebook':
                        shareLink = `https://www.facebook.com/sharer/sharer.php?href=${encodeURIComponent(url)}&quote=${encodeURIComponent(
                            text)}`;
                    case 'telegram':
                        shareLink = `https://t.me/share/url?url=${encodeURIComponent(url)}&text=${encodeURIComponent(
                            text)}`;
                        break;
                    case 'whatsapp':
                        shareLink = `https://api.whatsapp.com/send?text=${encodeURIComponent(text)}`;
                        break;
                    case 'x':
                        shareLink = `https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}`;
                        break;
                    case 'reddit':
                        shareLink = `https://www.reddit.com/submit?url=${encodeURIComponent(url)}&title=${encodeURIComponent(
                            text)}`
                        break;
                    default:
                        shareLink = '';
                        return;
                }

                window.open(shareLink, '_blank');
            }

            document.getElementById('share-x').addEventListener('click', () => shareScore('x'));
            document.getElementById('share-reddit').addEventListener('click', () => shareScore('reddit'));
            document.getElementById('share-telegram').addEventListener('click', () => shareScore('telegram'));
            document.getElementById('share-whatsapp').addEventListener('click', () => shareScore('whatsapp'));
            document.getElementById('share-facebook').addEventListener('click', () => shareScore('facebook'));
        </script>

        {!! $game->description !!}
    </div>

    <div class="w-3/4 mx-auto mb-20 mt-8">
        <div class="underline text-2xl mb-2">Here is the code</div>
        <div class="flex flex-col md:flex-row gap-2">
            <div class="overflow-hidden">
                <div>CSS</div>
                <div class="mockup-code">
                    <pre class="h-96"><code class="language-css">{{$game->css}}</code></pre>
                </div>
            </div>
            <div class="overflow-hidden">
                <div class="text-wrap">HTML</div>
                <div class="mockup-code">
                    <pre class="text-wrap p-2 h-96"><code class="language-html">{{ $game->html }}</code></pre>
                </div>
            </div>
            <div class="overflow-hidden">
                <div>JS</div>
                <div class="mockup-code">
                    <pre class="text-wrap p-2 h-96"><code class="language-js">{{ $game->js }}</code></pre>
                </div>
            </div>
        </div>
    </div>

</x-layout.app>
