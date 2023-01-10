<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsTag;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UtilController extends Controller
{
    public function countries()
    {
        $countries = Country::select('id', 'name')->orderBy('name', 'asc')->get();

        return JsonResource::collection($countries);
    }

    public function tags()
    {
        $tags = NewsTag::select('id', 'name')->get();

        return JsonResource::collection($tags);
    }

    public function newsCategories()
    {
        $categories = NewsCategory::withCount('news')->orderBy('news_count', 'desc')->get();
        return JsonResource::collection($categories);
    }
}
