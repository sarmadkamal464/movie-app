<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ url('/css/style.css') }}" />
    <link rel="stylesheet" href="{{ url('/css/pagination.css') }}">
</head>

<body>
     @include('navbar')
    <div class="Header1">
        <h1>Top Rated Movies</h1>
    </div>
    <div class="card-container">
       
        @foreach ($movies as $d)
            <!-- Movie Card Start -->
            <a href="{{ route('movies.show', ['id' => $d['id']]) }}">
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

                            <p class="card-movie-title">{{ $d['title'] }}</p>

                        </div>
                    </div>
                </div>
            </a>
            <!-- Movie Card End -->
        @endforeach
    </div>
    <div class="row">
        {{ $movies->links('pagination::bootstrap-4') }}


    </div>
    <div class="Header1">
        <h1>Top Rated Series</h1>
    </div>
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
                            <h5 class="card-movie-title">{{ $d['name'] }}</h5>
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
<script>
    document.getElementById('search-button').addEventListener('click', function() {
        document.getElementById('search-form').submit();
    });
</script>
