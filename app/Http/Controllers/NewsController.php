<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class NewsController extends Controller
{
    public function index() {

    }

    public function show(News $news) {
        $categories = Category::where('order','!=', 0)->where('visibility',true)->orderBy('order')->get();
        $latestNews = News::current()->latest()->take(30)->get();
        $relatedNews = News::current()->where('id','!=',$news->id)->take(3)->get();

        if(Cookie::get($news->id) == null) {
            Cookie::queue(Cookie::make($news->id, 'value', 1));
            $news->incrementReadCount();
        }

        return view('news.show', compact('news','categories','relatedNews','latestNews'));
    }

    public function search(Request $request) {

        $categories = Category::where('order','!=', 0)->where('visibility',true)->orderBy('order')->get();
        $results = [];
        $currentTag = null;
        if(isset($request->search)) {
            $results = News::where('title','like',"%{$request->search}%")
                ->orWhere('description','like',"%{$request->search}%")
                ->current()
                ->paginate()
                ->withQueryString();
        }

        if(isset($request->search_tag)) {
            $currentTagId = $request->search_tag;
            $currentTag = Tag::where('id',$currentTagId)->first();
            $results = News::whereHas('tags', function($query) use ($currentTagId) {
                $query->where('tag_id',$currentTagId);
            })->current()
                ->paginate()
                ->withQueryString();
        }

        return view('news.search', compact('results','categories','currentTag'));
    }
}
