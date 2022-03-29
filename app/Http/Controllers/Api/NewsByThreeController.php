<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewsByThreeController extends Controller
{
    public function index(Request $request) {

        $news = News::latest()->where('category_id',$request->id)->take(3)->get();

        return NewsResource::collection($news);
    }
}
