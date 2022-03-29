<?php

namespace App\Orchid\Screens\NewsImage;

use App\Models\Category;
use App\Models\NewsImage;
use App\Orchid\Layouts\NewsImage\NewsImageLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class NewsImageList extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'news_image' => NewsImage::paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Картинки';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make( __('Add'))
                ->icon('pencil')
                ->route('platform.news-image.edit')
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
            NewsImageLayout::class
        ];
    }
}
