<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsController extends Controller
{
    public function index()
    {

        $recent = News::where('status', 2)
                        ->select('title', 'slug')
                        ->latest('id')
                        ->take(4)
                        ->get();

        return view('content.news', compact('recent'));
    }

    public function getAll()
    {
        $news = News::join('news_categories', 'news_categories.id', '=', 'news.category')
                    ->where('status', 2)
                    ->latest('news.id')
                    ->select('news.title','news.extract','news_categories.name as category','news.slug')
                    ->get();

        return JsonResource::collection($news);
    }

    public function detail($slug){
        $detail = News::where('slug', $slug)->first();

        return view('content.news_detail', compact('detail'));
    }
}
