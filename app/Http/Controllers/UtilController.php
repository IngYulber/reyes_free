<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\NewsTag;
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


}
