<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href=@yield('canonical', url()->current())>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/atom-one-dark.min.css">
    <link rel="stylesheet" href="{{ asset('/dist/css/app.min.css') }}">
    <title>{{ get_the_blog_info('title') }} - @yield('title', 'title')</title>

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
