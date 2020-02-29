<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @if($companies->count())
        @foreach ($companies as $company)
            <url>
                <loc>{{ config('app.url')}}/company/{{ $company->id }}/show</loc>
                <lastmod>{{ $company->updated_at->tz('UTC')->toAtomString() }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.9</priority>
            </url>
        @endforeach
    @endif
</urlset>