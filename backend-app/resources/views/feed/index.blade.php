<?xml version="1.0" encoding="utf-8"?>
<feed xmlns="http://www.w3.org/2005/Atom">
  <title type="text">{{ $title }}</title>
  <subtitle type="html">{{ $subTitle }}</subtitle>
  <updated>{{ $updatedAt }}</updated>
  <id>{{ strtolower(route('web.root.index')) }}</id>
  {{-- <rights>Copyright (c) {{ $currentDate->format('Y') }}, {{ config('rubel.admin.name') }}</rights> --}}
  @foreach ($posts as $post)
    <entry>
        <title><![CDATA[{{ $post->title }}]]></title>
        <link rel="alternate" type='text/html' href="{{ strtolower(route('web.posts.show', $post)) }}" />
        <id>{{ strtolower(route('web.posts.show', $post)) }}</id>
        <updated>{{ $post->updated_at->toAtomString() }}</updated>
        <published>{{ $post->publication_date->toAtomString() }}</published>
        <author>
          <name><![CDATA[{{ $post->admin->name }}]]></name>
        </author>
        <summary type="html"><![CDATA[{!! mb_str_limit(strip_tags($post->html_content), 500, '...') !!}]]></summary>
    </entry>
  @endforeach
</feed>
