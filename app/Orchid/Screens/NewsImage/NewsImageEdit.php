<?php

namespace App\Orchid\Screens\NewsImage;

use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class NewsImageEdit extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = ' Новое изображение';

    /**
     * @var bool
     */
    public $exists = false;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(NewsImage $news_image): array
    {
        $this->exists = $news_image->exists;

        if($this->exists){
            $this->name = 'Edit image';
        }

        return [
            'news_image' => $news_image
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
            Button::make('Upload image')
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
                Select::make('news_image.news_id')
                    ->title('Category')
                    ->empty('Не выбрано')
                    ->fromModel(News::class,'title'),

                Picture::make('news_image.url')
                    ->title('Image'),
            ])
        ];
    }

    /**
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(NewsImage $news_image, Request $request)
    {
        $news_image->fill($request->get('news_image'))->save();

        Alert::info('You have successfully created a image.');

        return redirect()->route('platform.news-image.list');
    }

    /**
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(NewsImage $productsImage)
    {
        $productsImage->delete();

        Alert::info('You have successfully deleted image.');

        return redirect()->route('platform.news-image.list');
    }
}
