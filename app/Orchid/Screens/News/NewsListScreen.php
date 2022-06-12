<?php

namespace App\Orchid\Screens\News;

use App\Models\News;
use App\Orchid\Layouts\News\NewslistLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class NewsListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'news' => News::withoutGlobalScope('current')->orderBy('publication_date','desc')->filters()->paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Новости';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make( __('Добавить'))
                ->icon('pencil')
                ->route('platform.news.edit')
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            NewslistLayout::class
        ];
    }
}
