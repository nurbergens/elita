@props(['latestNews'])
    <div class="col-lg-4">
        <div class="side-bar short-col">
            <h3 class="side-bar__title">
                Соңғы жаңалықтар
            </h3>
            <div class="side-bar__wrap">
                @foreach($latestNews as $news)
                    <a href="{{ route('news.show', $news->id) }}" class="side-bar__item">
                        <span class="date">{{ $news->publication_date->format('H:i d.m.Y') }}</span>
                        <h4 class="side-bar__news-name">
                           {{ $news->title }}
                        </h4>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
