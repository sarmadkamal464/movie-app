<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\Services\GetApi;

class SearchController extends Controller
{
    public function search(GetApi $getApi, Request $request)
    {
        $query = $request->input('query');

        $results = $getApi->searchMovies($query);

        return view('search', compact('query', 'results'));
    }
}
