<?php

namespace App\Http\Controllers;

use App\Library\Services\GetApi;


class SeriesGenreController extends Controller
{

    public function getSeriesByGenre(GetApi $getApi, $id)
    {

        $series = $getApi->fetchSeriesByGenre($id);
        $seriesGenres = $getApi->fetchSeriesGenres();
        return view('seriesgenre', ['series' => $series, 'seriesGenres' => $seriesGenres]);
    }
}
