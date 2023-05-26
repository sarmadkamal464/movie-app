<?php

namespace App\Http\Controllers;

use App\Library\Services\GetApi;

class GenreController extends Controller
{
    public function showGenre(GetApi $getApi, $id)
    {
        $movies = $getApi->fetchMoviesByGenre($id);
        return view('genre', ['movies' => $movies]);
    }
}
