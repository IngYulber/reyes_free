<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsCategoryController extends Controller
{
    public function newsCategories()
    {
        $categories = NewsCategory::withCount('news')->orderBy('news_count', 'desc')->get();
        return JsonResource::collection($categories);
    }
}
