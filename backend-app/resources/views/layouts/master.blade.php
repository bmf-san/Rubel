<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Rubel - @yield('title', 'title')</title>
</head>
<body>
    {{-- Content area --}}
    @yield('content')

    {{-- Common script --}}
    <script type="text/javascript" src="{{ asset('/dist/app.bundle.js') }}"></script>

    {{-- Additional script --}}
    @yield('additional-script')
</body>
</html>
