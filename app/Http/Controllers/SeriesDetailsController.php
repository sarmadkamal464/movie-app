<?php

namespace App\Http\Controllers;

use App\Library\Services\GetApi;
use Illuminate\Http\Request;

class SeriesDetailsController extends Controller
{


    public function show($id, GetApi $getApi)
    {
        $movie = $getApi->fetchSeriesDetails($id);
        return view('seriesdetails', compact('movie'));
    }
}
