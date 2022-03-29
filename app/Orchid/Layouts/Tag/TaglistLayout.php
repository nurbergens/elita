<?php

namespace App\Orchid\Layouts\Tag;

use App\Models\Tag;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class TaglistLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'tags';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('title', 'Title')
                ->render(function (Tag $tag) {
                    return Link::make($tag->title)
                        ->route('platform.tag.edit', $tag);
                }),

            TD::make('created_at', 'Created')
                ->render(function ($model) {
                    return $model->updated_at->format('d.m.Y H:i:s');
                }),
        ];
    }
}
