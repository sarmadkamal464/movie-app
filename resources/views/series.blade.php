<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Series List</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.0/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
    <link rel="stylesheet" href="{{ url('/css/pagination.css') }}">
</head>


<body class="antialiased">
    @include('seriesnavbar')
    <div class="card-container">
        @foreach ($series as $d)
            <!-- Movie Card Start -->
            {{-- {{ dd($d) }} --}}
            <a href="{{ route('series.show', ['id' => $d['id']]) }}">
                <div class="card-view">
                    <div class="card-header moviecard">
                        <div class="card-header-icon">
                            <img src="https://www.themoviedb.org/t/p/original{{ $d['poster_path'] }}" alt="Poster"
                                class="card-image">

                        </div>
                    </div>
                    <div class="card-movie-content">
                        <div class="card-movie-content-head">
                            <p class="vote">
                                <i class="fas fa-star" style="color:rgb(255, 162, 0)"></i>
                                {{ $d['vote_average'] }}
                            </p>

                            <p class="card-movie-title">{{ $d['name'] }}</p>

                        </div>
                    </div>
                </div>
            </a>
            <!-- Movie Card End -->
        @endforeach
    </div>
    <div class="row">
        {{ $series->links('pagination::bootstrap-4') }}
    </div>

</body>

</html>
