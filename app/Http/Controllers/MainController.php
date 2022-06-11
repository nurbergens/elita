<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index() {

        $categories = Category::where('order','!=', 0)
            ->where('visibility',true)
            ->orderBy('order')
            ->get();
        $mainNews = News::current()->where('is_main',true)->latest()->take(4)->get();
        $latestNews = News::current()->latest()->take(30)->get();

        return view('index', compact('categories','mainNews','latestNews'));
    }
}
