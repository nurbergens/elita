<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category) {
        $categories = Category::where('order','!=', 0)->where('visibility',true)->orderBy('order')->get();
        $categoryNews = News::current()->latest()->where('category_id',$category->id)->paginate()->withQueryString();

        return view('category.index', compact('category','categories','categoryNews'));
    }
}
