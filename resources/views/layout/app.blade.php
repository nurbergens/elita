<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tizgin.kz</title>
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Tizgin.kz">
    <meta property="og:title" content="Tizgin.kz">
    <meta property="og:description" content="Tizgin.kz ақпараттық порталы">
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
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(88745247, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/88745247" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</head>
<body>
<div class="app">
    <div class="hidden">
        <div class="hidden__wrap">
            <div class="hidden__langs">
{{--        <span class="active">--}}
{{--            Ru--}}
{{--        </span>--}}
{{--                <span> |--}}
{{--            En--}}
{{--        </span> |--}}
{{--                <span>--}}
{{--            kz--}}
{{--        </span>--}}
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
                        Tizgin.kz ақпараттық порталы
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
            <div class="footer__info">
                <div class="footer__info_item">
                    <a href="https://wa.me/+77072192240">
                        +7 707 219 2240
                    </a>
                </div>
                <div class="footer__info_item">
                    <a href="mailto:tizginportaly@mail.ru">
                        tizginportaly@mail.ru
                    </a>
                </div>
                <div class="footer__info_item">
                    <a href="#">
                        Жарнама
                    </a>
                </div>
            </div>
            <div class="footer__text">
                Сайттағы материалдарды пайдаланғанда міндетті түрде сілтеме берулеріңізді сұраймыз. Ақпараттық порталдағы авторлық және басқа да құқықтар толығымен қорғалатынын ескертеміз.
                Автордың жеке пікірі редакцияның көзқарасы болып саналмайды.
                Жарнама мен түрлі хабарландыруларға жарнама беруші жауапты.
            </div>
{{--            <ul class="footer__menu nav__menu d-flex">--}}
{{--                <li>--}}
{{--                    <a href="#" class="nav__link">--}}
{{--                        Редакция--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="{{ route('about') }}" class="nav__link">--}}
{{--                        Компания туралы--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#" class="nav__link">--}}
{{--                        Жарнама--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
        </div>
        <div class="footer__row">
            <div class="footer__credits">
                2022 © tizgin.kz ақпараттық-сараптамалық порталы
            </div>
            <div class="footer__media media">
                <div class="media__item">
                    <!-- Yandex.Metrika informer -->
                    <a href="https://metrika.yandex.ru/stat/?id=88745247&amp;from=informer" target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/88745247/3_1_FFFFFFFF_EFEFEFFF_0_pageviews" style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" class="ym-advanced-informer" data-cid="88745247" data-lang="ru" /></a>
                    <!-- /Yandex.Metrika informer -->
                </div>
                <div class="media__item">
                    <!-- ZERO.kz -->
                    <span id="_zero_73766">
                  <noscript>
                    <a href="http://zero.kz/?s=73766" target="_blank">
                      <img src="http://c.zero.kz/z.png?u=73766" width="88" height="31" alt="ZERO.kz" />
                    </a>
                  </noscript>
                </span>
                    <script type="text/javascript">
                        var _zero_kz_ = _zero_kz_ || [];
                        _zero_kz_.push(["id", 73766]);
                        // Цвет кнопки
                        _zero_kz_.push(["type", 1]);
                        // Проверять url каждые 200 мс, при изменении перегружать код счётчика
                        // _zero_kz_.push(["url_watcher", 200]);

                        (function () {
                            var a = document.getElementsByTagName("script")[0],
                                s = document.createElement("script");
                            s.type = "text/javascript";
                            s.async = true;
                            s.src = (document.location.protocol == "https:" ? "https:" : "http:")
                                + "//c.zero.kz/z.js";
                            a.parentNode.insertBefore(s, a);
                        })(); //-->
                    </script>
                    <!-- End ZERO.kz -->
                </div>
                <div class="media__item">
                    <!--LiveInternet counter-->
                    <a href="https://www.liveinternet.ru/click" target="_blank"><img id="licnt5DDF" width="88" height="31" style="border:0" title="LiveInternet: показано число просмотров за 24 часа, посетителей за 24 часа и за сегодня" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAEALAAAAAABAAEAAAIBTAA7" alt=""/></a><script>(function(d,s){d.getElementById("licnt5DDF").src=
                            "https://counter.yadro.ru/hit?t11.6;r"+escape(d.referrer)+
                            ((typeof(s)=="undefined")?"":";s"+s.width+"*"+s.height+"*"+
                                (s.colorDepth?s.colorDepth:s.pixelDepth))+";u"+escape(d.URL)+
                            ";h"+escape(d.title.substring(0,150))+";"+Math.random()})
                        (document,screen)</script><!--/LiveInternet-->
                </div>
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


























