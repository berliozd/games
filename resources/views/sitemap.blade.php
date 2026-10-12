<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
    </url>
@foreach ($games as $game)
    <url>
        <loc>{{ url('/g/' . $game->slug) }}</loc>
@if ($game->updated_at)
        <lastmod>{{ \Illuminate\Support\Carbon::parse($game->updated_at)->toAtomString() }}</lastmod>
@endif
    </url>
@endforeach
</urlset>
