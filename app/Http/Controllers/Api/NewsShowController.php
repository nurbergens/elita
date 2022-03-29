<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\NewsResource;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsShowController extends Controller
{
    public function index(Request $request) {
        $category = Category::where('id',$request->id)->first();

        return new CategoryResource($category);
    }
}
