<x-layout.app>
    <x-slot:title>{{$game->name}}</x-slot>
    <x-slot:description>{{$game->description}}</x-slot>
    <div class="rounded-lg border p-8 flex flex-col sm:justify-center items-center w-3/4 mx-auto m-4 text-xl">
        {!! $game->content !!}
    </div>
    <div class="w-3/4 mx-auto text-xl">
        {{$game->description}}
    </div>
</x-layout.app>
