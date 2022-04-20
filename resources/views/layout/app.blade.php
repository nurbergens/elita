<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Elita.kz</title>
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Elite.kz">
    <meta property="og:title" content="Elite.kz">
    <meta property="og:description" content="Elita.kz ақпараттық порталы">
    <meta property="og:url" content="">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:image" content="img/header-bg.jpg">
    <meta property="og:image:width" content="968">
    <meta property="og:image:height" content="504">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href=" {{ @asset('css/slick.css') }} ">
    <link rel="stylesheet" href=" {{ @asset('css/app.css') }} ">
    <link rel="stylesheet" href=" {{ @asset('css/main.css') }} ">
    <link rel="stylesheet" href=" {{ @asset('css/media.css') }} ">
</head>
<body>
<div class="app">
    <div class="hidden">
        <div class="hidden__wrap">
            <div class="hidden__langs">
        <span class="active">
            Ru
        </span>
                <span> |
            En
        </span> |
                <span>
            kz
        </span>
            </div>
            <div class="hidden__menu nav__menu">
                <li>
                    <a class="nav__link" href="{{ route('main.index') }}">
                        Басты бет
                    </a>
                </li>
                @foreach($categories as $category)
                    <li>
                        <a class="nav__link" href="{{ route('category.index',$category->id) }}" data-name="name">
                            {{ $category->title}}
                        </a>
                    </li>
                @endforeach
            </div>
            <div class="offer__media media hidden__media">
                {{-- <a href="#" class="media__link">
                    <img src="{{ asset('img/insta-icon.svg') }}" alt="instagram" class="media__icon">
                </a>
                <a href="#" class="media__link">
                    <img src="{{ asset('img/in-icon.svg') }}" alt="linkedIn" class="media__icon">
                </a>
                <a href="#" class="media__link">
                    <img src="{{ asset('img/fb-icon.svg') }}" alt="facebook" class="media__icon">
                </a>
                <a href="#" class="media__link">
                    <img src="{{ asset('img/tg-icon.svg') }}" alt="telegram" class="media__icon">
                </a> --}}
            </div>
            <form action="{{ route('news.search') }}" class="search__search">
                <input type="text" name="search" class="search__input" placeholder="Іздеу" value="{{ Request::get('search') ? Request::get('search') : '' }}">
                <button type="submit" class="search__btn">
                    <img src="{{ @asset('img/search.svg')}}" alt="Search" class="search__img">
                </button>
            </form>
        </div>
    </div>

<header class="nav" id="nav">
    <div class="container">
        <div class="nav__wrapper d-flex align-items-center">
{{--            <img src="{{ @asset( 'img/logo.png')}}" alt="Logo" class="nav__logo">--}}
            <div class="nav__wrap">
                <div class="nav__company">
                    <div>
                        <div class="ham d-lg-none">
                            <span class="ham__item"></span>
                            <span class="ham__item"></span>
                            <span class="ham__item"></span>
                            <span class="ham__item"></span>
                        </div>
                    </div>
                    <span>
                        Elita.kz ақпараттық порталы
                    </span>
                    <div></div>
                </div>
                <div class="nav__controls d-none d-lg-flex">
                    <div class="nav__menu d-flex">
                        <li>
                            <a class="nav__link" href="{{ route('main.index') }}">
                                Басты бет
                            </a>
                        </li>
                        @foreach($categories as $category)
                            <li>
                                <a class="nav__link" href="{{ route('category.index',$category->id) }}" data-name="name">
                                    {{ $category->title}}
                                </a>
                            </li>
                        @endforeach
                    </div>
                    <div class="search__item">
                        <form action="{{ route('news.search') }}" class="search__search">
                            <input type="text" name="search" class="search__input" placeholder="Іздеу" value="{{ Request::get('search') ? Request::get('search') : '' }}">
                            <button type="submit" class="search__btn">
                                <img src="{{ @asset('img/search.svg')}}" alt="Search" class="search__img">
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

    @yield('content')

<footer class="footer" id="footer">
    <div class="container">
        <div class="footer__row">
            <div class="footer__logo">
                Logo
            </div>
            <ul class="footer__menu nav__menu d-flex">
                <li>
                    <a href="#" class="nav__link">
                        Редакция
                    </a>
                </li>
                <li>
                    <a href="{{ route('about') }}" class="nav__link">
                        Компания туралы
                    </a>
                </li>
                <li>
                    <a href="#" class="nav__link">
                        Жарнама
                    </a>
                </li>
            </ul>
        </div>
        <div class="footer__row">
            <div class="footer__credits">
                2022 © elita.kz ақпараттық-сараптамалық порталы
            </div>
            <div class="footer__media media">
                <a href="#" class="media__item">
                    <img src="{{ @asset('img/in.svg')}}" alt="in" class="media__logo">
                </a>
                <a href="#" class="media__item">
                    <img src="{{ @asset('img/fb.svg')}}" alt="facebook" class="media__logo">
                </a>
            </div>
        </div>
    </div>
</footer>


</div>
<script src="{{ @asset('js/jquery.min.js') }}"></script>
<script src="{{ @asset('js/slick.min.js') }}"></script>
<script src="{{ @asset('js/main.js') }}"></script>
</body>
</html>


























