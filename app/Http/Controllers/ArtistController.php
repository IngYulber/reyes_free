<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\ArtistType;
use App\Models\Country;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::join('countries','countries.id','=','artists.country')
                        ->join('artist_types','artist_types.id','=','artists.type')
                        ->select('artists.*','countries.name as country_name','countries.unicode','artist_types.name as type_name')
                        ->get();
        return view('content.artists', compact('artists'));
    }

    public function detail($slug){
        $artist = Artist::where('slug', $slug)->first();
        
        return view('content.artists_detail', compact('artist'));
    }

    public function categories(){
        $categories = ArtistType::withCount('artists')
                                ->orderBy('artists_count', 'desc')
                                ->get();

        return JsonResource::collection($categories);
    }


    public function artistsByCountry(){
        $artists = Country::withCount('artists')
                            ->having('artists_count','>',0)
                            ->orderBy('artists_count', 'desc')
                            ->get();
        return JsonResource::collection($artists);
    }

    public function artistsByStatus(){
        $artists = Artist::selectRaw('count(id) as number_of_artist, status')
                            ->groupBy('status')
                            ->orderBy('number_of_artist','desc')
                            ->get();
        return JsonResource::collection($artists);
    }
}
