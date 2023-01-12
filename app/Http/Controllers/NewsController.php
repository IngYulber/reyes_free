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
        $detail = News::join('news_categories','news_categories.id','=','news.category')
                        ->select('news.*','news_categories.name as category_name')
                        ->where('news.slug', $slug)
                        ->first();

        $next_id = $detail->id + 1;
        $previous_id = $detail->id - 1;
        
        $next = News::where('id', $next_id)
                            ->select('title','slug')                    
                            ->first();

        $previous = News::where('id', $previous_id)
                            ->select('title','slug')                    
                            ->first();

        $related = News::where('category', $detail->category)
                        ->where('status',2)
                        ->where('id','!=',$detail->id)
                        ->latest()
                        ->take(4)
                        ->get();

        return view('content.news_detail', compact('detail','related','next','previous'));
    }
}
