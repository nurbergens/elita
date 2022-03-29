@extends('layout.app')

@section('content')
    <section class="category" id="category">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="wide-col">
                        <h2 class="category__title">
                            ІЗДЕУ НӘТИЖЕЛЕРІ
                        </h2>
                        <h4 class="category__search">
                            СҰРАУ: <span>{{ Request::get('search') }}</span>
                            @if(isset($currentTag))
                                <div class="tags">
                                    <div class="tags__item">
                                        {{ $currentTag->title }}
                                    </div>
                                </div>
                            @endif
                        </h4>
                        <div class="category__wrap">
                            @foreach($results as $news_item)
                                <a href="{{ route('news.show', $news_item->id) }}" class="category__item">
                                    <img src="{{ $news_item->preview_image }}" alt="{{ $news_item->title }}" class="category__img">
                                    <div class="category__item-right">
                                        <div class="category__top">
                                            <div class="date">
                                                {{ $news_item->publication_date->format('d.m.Y')}}
                                            </div>
                                            <div class="tags">
                                                @foreach($news_item->tags as $tag)
                                                    <span class="tags__item">
                                                       {{ $tag->title }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>
                                        <h4 class="category__name">
                                            {{--                                        <span class="date"> {{ $news_item->publication_date }}</span>--}}
                                            {{ $news_item->title}}
                                        </h4>
                                        <p class="category__desc">
                                            {{ $news_item->description }}
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <div>
                            @if(count($results))
                                {{ $results->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script>
    import NewsForCategory from "../../js/components/News/NewsForCategory";
    export default {
        components: {NewsForCategory}
    }
</script>
