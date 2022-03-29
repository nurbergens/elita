<?php

namespace App\Orchid\Screens\Tag;

use App\Models\Tag;
use App\Orchid\Layouts\Tag\TaglistLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class TagList extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'tags' => Tag::paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Тэги';
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
                ->route('platform.tag.edit')
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
            TaglistLayout::class
        ];
    }
}
