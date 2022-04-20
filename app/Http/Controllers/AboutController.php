<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index() {
        $categories = Category::where('order','!=', 0)->where('visibility',true)->orderBy('order')->get();

        return view('pages.about', compact('categories',));
    }
}
