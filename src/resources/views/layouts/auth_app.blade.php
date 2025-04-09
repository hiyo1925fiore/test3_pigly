<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/common.css') }}">
    @yield('css')
</head>
<body>
    <div class="app">
        @yield('content')
    </div>
</body>
</html>