<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ get_blog_info('title') }} - @yield('title', 'title')</title>
</head>
<body>
    {{-- Content area --}}
    @yield('content')

    <script type="text/javascript" src={{ asset('/dist/app.bundle.js') }}></script>

    {{-- Additional script --}}
    @yield('additional-script')
</body>
</html>
