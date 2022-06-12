<?php

namespace App\Orchid\Layouts\News;

use App\Models\News;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class NewslistLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'news';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('preview_image', ' Фото')
                ->width('15%')
                ->render(function ($model) {
                    return "<img src=' $model->preview_image' alt='image' class='img-fluid'>";
                }),
            TD::make('title', 'Заголовок')
                ->width('20%')
                ->sort()
                ->filter(Input::make())
                ->render(function (News $news) {
                    return Link::make($news->title)
                        ->route('platform.news.edit', $news);
                }),
            TD::make('description', 'Описание')
                ->width('30%'),
            TD::make('reads','Просмотры')
                ->sort(),
            TD::make('is_main', 'Главная новость'),
            TD::make('category', 'Категория')
                ->render(function ($model){
                    return $model->category->title;
                }),

            TD::make('created_at', 'Дата создания')
                ->sort()
                ->render(function ($model) {
                    return $model->updated_at->format('d.m.Y H:i');
                }),
        ];
    }
}
