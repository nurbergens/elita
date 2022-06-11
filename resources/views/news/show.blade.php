@extends('layout.app')

@section('title', $news->title . ' | Tizgin.kz')
@section('metatitle', $news->title)
@section('metadescription', $news->description)
@section('metaimage', asset($news->preview_image))
@section('content')
    <section class="offer news-item" id="news-item">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="wide-col">
                        <div class="breadcrumb">
                            <a href="{{ route('main.index') }}" class="breadcrumb__link">
                                Басты бет
                            </a>
                            <a href="{{ route('category.index', $news->category->id) }}" class="breadcrumb__link">
                                {{ $news->category->title }}
                            </a>
                            <a href="" class="breadcrumb__link">
                                {{ $news->title }}
                            </a>
                        </div>

                        <h2 class="news-item__title">
                            {{ $news->title }}
                        </h2>
                        <div class="date">
                            {{ $news->publication_date->format('H:i d.m.Y') }}

                            <div class="shows">
                                <img src="{{ @asset('img/icons/eye_icon.svg') }}" alt="" class="shows__icon">
                                <span>{{ $news->reads }}</span>
                            </div>
                        </div>
                        <br>

                        <div class="offer__slider">
                            <div>
                                <img src="{{ url($news->preview_image) }}" alt="News" class="news-item__img">
                                <span class="news-item__img-text">
                                    Фото: {{ $news->image_text }}
                                </span>
                            </div>
                            @if(count($news->images))
                                @foreach($news->images as $image)
                                    <div>
                                        <img src="{{ url($image->url) }}" alt="News" class="news-item__img">
                                        <span class="news-item__img-text">
                                            Фото: {{ $news->image_text }}
                                        </span>
                                    </div>
                                @endforeach
                            @endif
                        </div>
{{--                        <img src="{{ $news->preview_image }}" alt="{{ $news->title }}" class="news-item__img">--}}
                        <div class="news-item__desk">
                            {{ $news->description }} <br><br>
                        </div>
                        <div  class="news-item__text">
                            {!! $news->content  !!}
                        </div>
                        <div class="tags">
                            @foreach($news->tags as $tag)
                                <form action="{{ route('news.search') }}">
                                    <input type="hidden" value="{{ $tag->id }}" name="search_tag">
                                    <button type="submit" class="tags__item">
                                        {{ $tag->title }}
                                    </button>
                                </form>
                            @endforeach
                        </div>

                        <div class="news-item__related">
                            <a href="#" class="news__title">
                                Ұқсас материалдар:
                            </a>
                            <div class="news__wrap">
                                @foreach($relatedNews as $news_item)
                                    <a href="{{ route('news.show', $news_item->id) }}" class="news__item">
                                        <img src="{{ $news_item->preview_image }}" alt="news" class="news__img">
                                        <div class="news__bottom">
                                            <h3 class="news__name">
                                                <span class="date">{{ $news_item->publication_date->format('d.m.Y') }}</span>
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
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                <x-sidebar :latestNews="$latestNews"></x-sidebar>
            </div>
        </div>
    </section>
@endsection
