<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @if($tags->count())
        @foreach ($tags as $tag)
            <url>
                <loc>{{ config('app.url')}}/offer/tag/{{ $tag->slug }}</loc>
                <lastmod>{{ $tag->updated_at->tz('UTC')->toAtomString() }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.9</priority>
            </url>
        @endforeach
    @endif
</urlset>