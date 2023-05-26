<?php

namespace App\Library\Services;

use Illuminate\Support\Facades\Http;

class GetApi
{
    protected $tmdbEndpoint;
    protected $tmdbApiKey;

    public function __construct($tmdbEndpoint, $tmdbApiKey)
    {
        $this->tmdbEndpoint = $tmdbEndpoint;
        $this->tmdbApiKey = $tmdbApiKey;
    }

    public function fetchHomeMovies()
    {
        $response = Http::asJson()
            ->get($this->tmdbEndpoint . 'movie/top_rated' . '?api_key=' . $this->tmdbApiKey);
        $data = $response->json()['results'];
        return $data;
    }


    public function fetchMovies()
    {
        $response = Http::asJson()
            ->get($this->tmdbEndpoint . 'movie/popular' . '?api_key=' . $this->tmdbApiKey);
        $data = $response->json()['results'];
        return $data;
    }

    public function fetchMovieDetails($id)
    {
        $response = Http::asJson()
            ->get($this->tmdbEndpoint . 'movie/' . $id . '?api_key=' . $this->tmdbApiKey);
        $details = $response->json();
        return $details;
    }


    //Genre Functions Starts Here

    public function fetchGenres()
    {
        $response = Http::asJson()->get($this->tmdbEndpoint . 'genre/movie/list' . '?api_key=' . $this->tmdbApiKey);
        $data = $response->json()['genres'];
        return $data;
    }

    public function fetchMoviesbyGenre($Id)
    {
        $response = Http::asJson()->get($this->tmdbEndpoint . 'discover/movie', [
            'api_key' => $this->tmdbApiKey,
            'with_genres' => $Id
        ]);

        $movies = $response->json()['results'];
        return $movies;
    }

    public function fetchSeriesGenres()
    {
        $response = Http::asJson()->get($this->tmdbEndpoint . 'genre/tv/list' . '?api_key=' . $this->tmdbApiKey);
        $data = $response->json()['genres'];
        return $data;
    }
    public function fetchSeriesByGenre($id)
    {
        $response = Http::asJson()->get($this->tmdbEndpoint . 'discover/tv', [
            'api_key' => $this->tmdbApiKey,
            'with_genres' => $id
        ]);

        $series = $response->json()['results'];
        return $series;
    }


    //Genre Function Ends Here


    public function fetchSeries()
    {
        $response = Http::asJson()
            ->get($this->tmdbEndpoint . 'tv/top_rated' . '?api_key=' . $this->tmdbApiKey);
        $data = $response->json()['results'];
        return $data;
    }

    public function fetchSeriesDetails($id)
    {
        $response = Http::asJson()
            ->get($this->tmdbEndpoint . 'tv/' . $id . '?api_key=' . $this->tmdbApiKey);
        $data = $response->json();
        return $data;
    }



    //Movie Search functionality
    public function searchMovies($query)
    {
        $response = Http::asJson()
            ->get($this->tmdbEndpoint . 'search/movie', [
                'api_key' => $this->tmdbApiKey,
                'query' => $query,
            ]);
        $data = $response->json()['results'];
        return $data;
    }


    //Series Search functionality
    public function searchSeries($query)
    {
        $response = Http::asJson()
            ->get($this->tmdbEndpoint . 'search/tv', [
                'api_key' => $this->tmdbApiKey,
                'query' => $query,
            ]);
        $data = $response->json()['results'];
        return $data;
    }
}
