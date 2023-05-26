<?php

namespace App\Http\Controllers;

use App\Library\Services\GetApi;
use App\Helpers\PaginationHelper;
use Illuminate\Http\Request;

class SeriesController extends Controller
{

    public function index(GetApi $getApi, Request $request)
    {
        $series = $getApi->fetchSeries();
        $seriesGenres = $getApi->fetchSeriesGenres();
        $paginatedSeries = PaginationHelper::paginateData($series, $request, 'series');
        return view('series', ['series' => $paginatedSeries, 'seriesGenres' => $seriesGenres]);
    }
}
