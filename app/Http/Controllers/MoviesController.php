<?php

namespace App\Http\Controllers;

use App\Library\Services\GetApi;
use App\Helpers\PaginationHelper;
use Illuminate\Http\Request;

class MoviesController extends Controller
{


    public function index(GetApi $getApi, Request $request)
    {
        $movies = $getApi->fetchMovies();
        $paginatedMovies = PaginationHelper::paginateData($movies, $request, 'movies_page');
        return view('movies', ['movies' => $paginatedMovies]);
    }

}
//define route like this 
// GET http://127.0.0.1:8000/movie/list -> list movies
// POST http://127.0.0.1:8000/movie/add -> add new movie
// GET http://127.0.0.1:8000/movie/1 -> view movie
// PUT http://127.0.0.1:8000/movie/edit/1 -> update movie
// DELETE http://127.0.0.1:8000/movie/1 -> delete movie

//define other movie routes