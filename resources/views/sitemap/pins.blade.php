<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @if($pins->count())
        @foreach ($pins as $pin)
            <url>
                <loc>{{ config('app.url')}}/blog/tag/{{ $pin->slug }}</loc>
                <lastmod>{{ $pin->updated_at->tz('UTC')->toAtomString() }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.9</priority>
            </url>
        @endforeach
    @endif
</urlset>