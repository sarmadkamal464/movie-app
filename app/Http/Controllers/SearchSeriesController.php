<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\Services\GetApi;

class SearchSeriesController extends Controller
{
    public function search(GetApi $getApi, Request $request)
    {
        $query = $request->input('query');

        $series = $getApi->searchSeries($query);

        $seriesGenres = $getApi->fetchSeriesGenres();

        return view('searchseries', ['series' => $series, 'seriesGenres' => $seriesGenres]);
    }
}
