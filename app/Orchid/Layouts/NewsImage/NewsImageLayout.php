<?php

namespace App\Orchid\Layouts\NewsImage;

use App\Models\NewsImage;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Repository;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class NewsImageLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'news_image';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'Image')
                ->width('20%')
                ->render(function (NewsImage $model) {
                    // Please use view('path')
                    return "<img src='$model->url'
                              alt='sample'
                              class='d-block img-fluid'>";
                }),
            TD::make('news_id', 'News Id'),
            TD::make('title', 'News Title')
                ->render(function(NewsImage $newsImage){
                    return Link::make($newsImage->news->title)
                        ->route('platform.news-image.edit', $newsImage->id);
                }),

            TD::make('created_at', 'Created at')
                ->render(function($model) {
                    return $model->created_at->format('d.m.Y');
                })
        ];
    }
}
