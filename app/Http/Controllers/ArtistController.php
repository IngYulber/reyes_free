<?php

namespace App\Http\Controllers;


class ArtistController extends Controller
{
    public function index()
    {
        return view('content.artists');
    }
}
