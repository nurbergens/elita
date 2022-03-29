<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryIndexController extends Controller
{
    public function index(Request $request) {
        $news = News::where('category_id',$request->id)->latest()->get();

        return NewsResource::collection($news);
    }
}
