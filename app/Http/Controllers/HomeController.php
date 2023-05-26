<?php

namespace App\Http\Controllers;

use App\Library\Services\GetApi;
use Illuminate\Http\Request;
use App\Helpers\PaginationHelper;

class HomeController extends Controller
{


    public function home(GetApi $getApi, Request $request)
    {
        $movies = $getApi->fetchHomeMovies();
        $series = $getApi->fetchSeries();
        $paginatedMovies = PaginationHelper::paginateData($movies, $request, 'movies');
        $paginatedSeries = PaginationHelper::paginateData($series, $request, 'series');
        return view('home', ['movies' => $paginatedMovies, 'series' => $paginatedSeries]);
    }
}
