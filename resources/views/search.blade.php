<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Movies</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- TailwindCss CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.0/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/pagination.css') }}" />
</head>

<body class="antialiased">
    @include('navbar')

    <div class="card-container">
        @foreach ($results as $d)
            <!-- Movie Card Start -->
            <a href="{{ route('movies.show', ['id' => $d['id']]) }}">
                <div class="card-view">
                    <div class="card-header moviecard">
                        <div class="card-header-icon">
                            @if (!empty($d['poster_path']))
                                <img src="https://www.themoviedb.org/t/p/original{{ $d['poster_path'] }}" alt="Poster"
                                    class="card-image">
                            @else
                                <img src="{{ asset('no-poster.jpg') }}" alt="No Poster" class="no-image">
                            @endif
                        </div>


                    </div>
                    <div class="card-movie-content">
                        <div class="card-movie-content-head">
                            <p class="vote">
                                <i class="fas fa-star" style="color:rgb(255, 162, 0)"></i>
                                {{ number_format($d['vote_average'], 1) }}
                            </p>
                            <h5 class="card-movie-title">{{ $d['title'] }}</h5>
                        </div>
                    </div>
                </div>
            </a>
            <!-- Movie Card End -->
        @endforeach
    </div>

</body>

</html>
<script>
    document.getElementById('search-button').addEventListener('click', function() {
        document.getElementById('search-form').submit();
    });
</script>
