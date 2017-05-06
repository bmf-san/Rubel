<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rubel - @yield('title', 'title')</title>
</head>
<body>
    {{-- Content area --}}
    @yield('content')

    {{-- Additional script --}}
    @yield('additional-script')
    <script type="text/javascript" src="./dist/app.bundle.js"></script>
</body>
</html>
