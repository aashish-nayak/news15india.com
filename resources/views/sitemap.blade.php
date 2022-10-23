<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{route('home')}}</loc>
    </url>
    <url>
        <loc>{{route('reporter-application-form')}}</loc>
    </url>
    <url>
        <loc>{{route('sitemap')}}</loc>
    </url>
    <url>
        <loc>{{route('login')}}</loc>
    </url>
    <url>
        <loc>{{route('register')}}</loc>
    </url>
    @foreach ($cats as $cat)
    <url>
        <loc>{{route('category-news',$cat->slug)}}</loc>
        <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime($cat->updated_at)) }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.5</priority>
    </url>
    @endforeach
    @foreach ($tags as $tag)
    <url>
        <loc>{{route('tag-news',$tag->slug)}}</loc>
        <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime($tag->updated_at)) }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.5</priority>
    </url>
    @endforeach
    @foreach ($authors as $author)
    <url>
        <loc>{{route('author',$author->details->url)}}</loc>
        <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime($author->updated_at)) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.5</priority>
    </url>
    @endforeach
    @foreach ($news as $new)
    <url>
        <loc>{{route('single-news',[$new->slug])}}</loc>
        <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime($new->updated_at)) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach
</urlset>