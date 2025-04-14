<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    @yield('css')
</head>
<body>
    <header class="header">
        <p class="header__title">PiGLy</p>
        <nav class="header__button">
            <ul class="header__button-container">
                <li class="header__button-item--setting">
                    <img class="header__button-icon" src="images/setting-icon.png" alt="">
                    <a class="header__button-text" href="/weight_logs/goal_setting">目標体重設定</a></li>
                <li class="header__button-item--logout">
                    <img class="header__button-icon" src="images/logout-icon.png" alt="">
                    <a class="header__button-text" href="/logout">ログアウト</a></li>
            </ul>
        </nav>
    </header>
    <main class="content">
        @yield('content')
    </main>
</body>
</html>