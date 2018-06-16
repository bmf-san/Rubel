<!DOCTYPE html>
<html lang="ja">
<head>
    <title>{{ get_the_blog_info('title') }} - @yield('title', get_the_blog_info('sub_title'))</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="@yield('description', get_the_blog_info('description'))" />
    <meta name="og:title" content="@yield('og_title', get_the_blog_info('title'))" />
    <meta name="og:description" content="@yield('og_description', get_the_blog_info('title'))" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content=@if(request()->is('/'))"website"@else"article"@endif>
    <meta property="og:image" content="{{ asset('img/header.jpg')}}" />
    <meta property="og:site_name" content="{{ get_the_blog_info('title') }}" />
    <meta property="og:locale" content="ja_JP" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@bmf_san" />
    <link rel="canonical" href="@yield('canonical', url()->current())">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/atom-one-dark.min.css">
    <link rel="stylesheet" href="{{ asset('/dist/css/app.min.css') }}">

    {{-- Additional stylesheet --}}
    @yield('additional-stylesheet')

    {{-- Google Analytics Code --}}
    {!! get_the_google_analytics_code(config('google.analytics.tracking_id')) !!}
</head>
<body>
    {{-- Content area --}}
    @yield('content')

    <script type="text/javascript" src={{ asset('/dist/js/app.bundle.js') }}></script>

    {{-- Additional script --}}
    @yield('additional-script')
</body>
</html>
