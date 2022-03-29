<?php

namespace App\Orchid\Screens\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class CategoryEdit extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = ' Новая категория';

    /**
     * @var bool
     */
    public $exists = false;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Category $category): array
    {
        $this->exists = $category->exists;

        if($this->exists){
            $this->name = 'Редактировать';
        }

        return [
            'category' => $category
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
            Button::make('Create')
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
                Input::make('category.title')
                    ->title('Title')
                    ->required(),

                CheckBox::make('category.visibility')
                    ->sendTrueOrFalse()
                    ->checked()
                    ->title('Visibility'),

                Select::make('category.order')
                    ->title('Order')
                    ->options(
                        $this->orders(true)
                    )
                    ->required()
                    ->canSee(!$this->exists),


                Select::make('category.order')
                    ->title('Order')
                    ->options(
                        $this->orders(false)
                    )
                    ->required()
                    ->canSee($this->exists),

            ])
        ];
    }

    /**
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Category $category, Request $request)
    {

        $orders = Category::where('id' ,'>' ,0)->orderBy('order')->pluck('order');

        if ($orders->contains($request->category['order'])) {

            Category::where('order',$request->category['order'])
                ->update(['order'=>$category->order ?? $orders->last() + 1]);
        }

        $category->fill($request->get('category'))->save();

        Alert::info('You have successfully created a category.');

        return redirect()->route('platform.category.list');
    }

    /**
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Category $category)
    {
        $category->delete();

        Alert::info('You have successfully deleted category.');

        return redirect()->route('platform.category.list');
    }

    public function orders($not_exists) {

        $orders = Category::where('id' ,'>' ,0)->orderBy('order')->pluck('order');

        if ($not_exists) {
            $orders->push($orders->count()>0 ? $orders->last() + 1 : 0);
        }

        return $orders;
    }
}
