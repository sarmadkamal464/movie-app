<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.0/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/details.css') }}" />
    <title>Movies Details</title>

</head>

<body>
    <div class="div-btn">
        <a href="{{ route('home') }}" class="back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
    </div>
    <div class="card-container">
        <!-- Movie Card Start -->
        {{-- @dump($movie) --}}

        <div class="card-view">
            <div class="card-header">
                <img src="https://www.themoviedb.org/t/p/original{{ $movie['poster_path'] }}" alt="Poster"
                    class="card-image">
            </div>
            <div class="card-movie-content">
                <div class="card-movie-content-head">
                    <p class="vote">
                        <i class="fas fa-star" style="color:rgb(255, 162, 0)"></i>
                        {{ number_format($movie['vote_average'], 1) }}
                    </p>
                    <h2 class="card-movie-title">{{ $movie['title'] }}</h2>
                    <h5 class="card-movie-title">{{ $movie['release_date'] }}</h5>
                    <h5 class="card-movie-title">
                        @foreach ($movie['genres'] as $genre)
                            <span class="genre">{{ $genre['name'] }}</span>
                            @if (!$loop->last)
                            @endif
                        @endforeach
                    </h5>
                    <p class="min">{{ $movie['runtime'] }}min</p>
                    <p class="card-movie-description">{{ $movie['overview'] }}</p>
                </div>
            </div>
        </div>
        <!-- Movie Card End -->
    </div>
</body>

</html>
