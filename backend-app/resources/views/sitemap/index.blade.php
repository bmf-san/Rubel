<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  @foreach ($sitemap as $data)
    <url>
      <loc>{{ $data->url }}</loc>
      <lastmod>{{ $data->updated_at }}</lastmod>
    </url>
  @endforeach
</urlset>
