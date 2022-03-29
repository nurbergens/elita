<?php

namespace App\Orchid\Screens\Tag;

use App\Models\News;
use App\Models\Tag;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class TagEdit extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = ' Новый тэг';

    /**
     * @var bool
     */
    public $exists = false;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Tag $tag): array
    {
        $this->exists = $tag->exists;

        if($this->exists){
            $this->name = 'Редактировать';
        }

        return [
            'tag' => $tag
        ];
    }

    /**
     * Button commands.
     *
     * @return Link[]
     */
    public function commandBar(): array
    {
        return [
            Button::make('Создать')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->exists),

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->exists),
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make('tag.title')
                    ->title('Title')
                    ->required()
            ])
        ];
    }

    /**
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Tag $tag, Request $request)
    {
        $tag->fill($request->get('tag'))->save();

        Alert::info('You have successfully created a tag.');

        return redirect()->route('platform.tag.list');
    }

    /**
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Tag $tag)
    {
        $tag->delete();

        Alert::info('You have successfully deleted tag.');

        return redirect()->route('platform.tag.list');
    }
}
