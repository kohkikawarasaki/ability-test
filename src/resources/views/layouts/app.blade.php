<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせフォーム</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-utilities">
                <a class="header__logo" href="/">FashinablyLate</a>
                <nav class="header-nav">
                    <ul class="header-nav__list">
                        @if (Auth::check())
                            <li class="header-nav__item">
                                <form action="/logout" class="header-nav__form" method="POST">
                                    @csrf
                                    <button class="header-nav__button">logout</button>
                                </form>
                            </li>
                        @elseif (Request::is('login'))
                            <li class="header-nav__item">
                                <form action="/register" class="header-nav__form" method="GET">
                                    @csrf
                                    <button class="header-nav__button">register</button>
                                </form>
                            </li>
                        @elseif (Request::is('register'))
                            <li class="header-nav__item">
                                <form action="/login" class="header-nav__form" method="GET">
                                    @csrf
                                    <button class="header-nav__button">login</button>
                                </form>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>
