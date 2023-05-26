<script>
    // Function to retain the selected option value
    function retainSelectedOption(selectElement) {
        var selectedValue = selectElement.value;
        sessionStorage.setItem('selectedOption', selectedValue);
        window.location.href = selectedValue;
    }

    // Check if there's a stored selected option value and set it as the default selected option
    window.addEventListener('DOMContentLoaded', function() {
        var selectedValue = sessionStorage.getItem('selectedOption');
        if (selectedValue) {
            var selectElement = document.getElementById('genreSelect');
            selectElement.value = selectedValue;
        }
    });
</script>

<div class="nav-bar">
    <ul>
        <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
            <a href="{{ route('home') }}">Home</a>
        </li>
        <li class="{{ request()->routeIs('movies.list') ? 'active' : '' }}">
            <a href="{{ route('movies.list') }}">Movies</a>
        </li>
        <li class="{{ request()->routeIs('series.list') ? 'active' : '' }}">
            <a href="{{ route('series.list') }}">Series</a>
        </li>
        <div class="genres">
            <li>
                <select onchange="retainSelectedOption(this);" id="genreSelect">
                    <option value="{{ route('genre') }}" {{ !request()->has('id') ? 'selected' : '' }}>Genres</option>
                    @foreach ($seriesGenres as $genre)
                        <option value="{{ route('genre.series', ['id' => $genre['id']]) }}"
                            {{ request('id') == $genre['id'] ? 'selected' : '' }}>
                            {{ $genre['name'] }}
                        </option>
                    @endforeach
                </select>

            </li>
        </div>
    </ul>
    <form id="search-form" action="{{ route('search.series') }}" method="GET">
        <div class="search-container">
            <input type="text" name="query" id="search-input" placeholder="Search.."
                value="{{ request()->input('query') }}">
            <button type="button" class="search-icon" id="search-button">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </form>

</div>
<script>
    document.getElementById('search-button').addEventListener('click', function() {
        document.getElementById('search-form').submit();
    });
</script>
