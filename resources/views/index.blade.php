@extends('layout.app')

@section('content')

    <section class="offer" id="offer">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="offer__wrap wide-col">
                        @if( count($mainNews) > 0)
                        <div class="offer__slider">
                            @if(count($mainNews[0]->images))
                                @foreach($mainNews[0]->images as $image)
                                    <div>
                                        <img src="{{ url($image->url) }}" alt="News" class="offer__img">
                                    </div>
                                @endforeach
                            @else
                                <div>
                                    <img src="{{ url($mainNews[0]->preview_image) }}" alt="News" class="offer__img">
                                </div>
                            @endif
                        </div>
                        <div class="offer__box">
                            <div class="offer__box-top">
                                Басты ақпарат
                            </div>
                            <a href="{{ route('news.show', $mainNews[0]->id) }}" class="offer__box-bottom">
                                <h1 class="offer__title">
                                    {{ $mainNews[0]->title }}
                                </h1>
                            </a>
                        </div>
                        @else
                        <h1 class="offer__title">
                            Please wait!
                        </h1>
                        @endif
                    </div>
                </div>
                <x-sidebar :latestNews="$latestNews">
                </x-sidebar>
            </div>
        </div>
    </section>
    <section class="news accented" id="main-news">
        <div class="container">
{{--            <a href="#" class="news__title">--}}
{{--                Бас тақырып--}}
{{--            </a>--}}
            <div class="news__wrap">
                @foreach($mainNews as $key => $news_item)
                    @if($key > 0)
                    <a href="{{ route('news.show', $news_item->id) }}" class="news__item">
                        <img src="{{ $news_item->preview_image }}" alt="news" class="news__img">
                        <div class="news__bottom">
                            <h3 class="news__name">
                                <span class="date">{{ $news_item->publication_date->translatedFormat('d F, Y') }}</span>
                                {{ $news_item->title }}
                                <div class="tags">
                                    @foreach($news_item->tags as $tag)
                                        <span class="tags__item">
                                                    {{ $tag->title  }}
                                                </span>
                                    @endforeach
                                </div>
                            </h3>
                            <p class="news__desk">
                                {{ $news_item->description }}
                            </p>
                        </div>
                    </a>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    @foreach($categories as $category)
        @if(count($category->news) > 0)
            <section class="news" id="news-culture">
                <div class="container">
                    <a href="{{ route('category.index', $category->id ) }}" class="news__title">
                        {{ $category->title }}
                    </a>
                    <div class="news__wrap">
                        @foreach($category->news as $news_item)
                            @if($loop->index < 3)
                            <a href="{{ route('news.show', $news_item->id) }}" class="news__item">
                                <img src="{{ $news_item->preview_image }}" alt="news" class="news__img">
                                <div class="news__bottom">
                                    <h3 class="news__name">
                                        <span class="date">{{ $news_item->publication_date->translatedFormat('d F, Y') }}</span>
                                        {{ $news_item->title }}
                                        <div class="tags">
                                            @foreach($news_item->tags as $tag)
                                                <span class="tags__item">
                                                    {{ $tag->title  }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </h3>
                                    <p class="news__desk">
                                        {{ $news_item->description }}
                                    </p>
                                </div>
                            </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    @endforeach
@endsection
