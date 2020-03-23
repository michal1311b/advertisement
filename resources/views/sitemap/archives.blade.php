<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @if($offers->count())
        @foreach ($offers as $offer)
            <url>
                <loc>{{ config('app.url')}}/offer/show/{{ $offer->id }}/{{ $offer->slug }}</loc>
                <lastmod>{{ $offer->updated_at->tz('UTC')->toAtomString() }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.9</priority>
            </url>
        @endforeach
    @endif
</urlset>