<?php

namespace App\Orchid\Screens\News;

use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class NewsEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = ' Новый продукт';

    /**
     * @var bool
     */
    public $exists = false;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(News $news): array
    {

//        dd($news->toArray());
        $this->exists = $news->exists;

        if($this->exists){
            $this->name = 'Edit news';
        }

        $news->tag_ids = $news->tags;

        return [
            'news' => $news
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Редактировать новость';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Создать')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->exists),

            Button::make('Обновить')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->exists),

            Button::make('Удалить')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->exists),
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
            Layout::rows([
                Input::make('news.title')
                    ->title('Название')
                    ->required(),
                TextArea::make('news.description')
                    ->title('Description')
                    ->rows(5)
                    ->required(),
                Quill::make('news.content')
                    ->required(),
                CheckBox::make('news.is_main')
                    ->sendTrueOrFalse()
                    ->title('Главная новость'),
                DateTimer::make('news.publication_date')
                    ->title('Дата публикаций')
                    ->allowInput()
                    ->enableTime()
                    ->format24hr()
                    ->required(),

                Select::make('news.category_id')
                    ->empty('Не выбрано')
                    ->title('Категория')
                    ->fromModel(Category::class, 'title')
                    ->required(),

                Relation::make('news.tag_ids.')
                    ->fromModel(Tag::class, 'title')
                    ->multiple()
                    ->title('Тэги'),

                Picture::make('news.preview_image')
                    ->required(),
                Input::make('news.image_text')
                    ->title('Ссылка на изображение')
            ])
        ];
    }

    /**
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(News $news, Request $request)
    {

//        dd($request->news);

        $tagIds = [];
        if( isset($request->news['tag_ids'])) {
            $tagIds = $request->news['tag_ids'];
        }

        $news->fill($request->get('news'))->save();
        $news->tags()->sync($tagIds);

        Alert::info('You have successfully created a news.');

        return redirect()->route('platform.news.list');
    }

    /**
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(News $news)
    {
        $news->delete();

        Alert::info('You have successfully deleted news.');

        return redirect()->route('platform.news.list');
    }
}
