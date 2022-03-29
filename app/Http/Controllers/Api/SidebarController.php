<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\News;

class SidebarController extends Controller
{
    public function index() {

        $news = News::latest()->get();

        return NewsResource::collection($news);

    }
}
