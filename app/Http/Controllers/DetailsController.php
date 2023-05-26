<?php

namespace App\Http\Controllers;

use App\Library\Services\GetApi;

class DetailsController extends Controller
{


    public function show($id, GetApi $getApi)
    {
        $movie = $getApi->fetchMovieDetails($id);
        return view('details', compact('movie'));
    }
}
