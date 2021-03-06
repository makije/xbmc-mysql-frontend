<h1>{{ $person->getName() }}</h1>

@if($person->thumb())
	<img src="{{$person->thumb()}}" width="100px"/>
@endif

@if($person->moviesActed()->get()->count() > 0)
	<h2>Movie(s)</h2>

	@include('templates.movie-list', array('movies' => $person->moviesActed()->get(), 'paginate' => false, 'as' => true))
@endif

@if($person->tvshowsActed()->get()->count() > 0)
	<h2>TV Show(s)</h2>

	@include('templates.tvshow-list', array('shows' => $person->tvshowsActed()->get(), 'paginate' => false, 'as' => false))
@endif

@if($person->moviesDirected()->get()->count() > 0)
	<h2>Movies directed</h2>

	@include('templates.movie-list', array('movies' => $person->moviesDirected()->get(), 'paginate' => false))
@endif

@if($person->episodesDirected()->get()->count() > 0)
	<h2>Episodes directed</h2>

	@include('templates.episode-list', array('episodes' => $person->episodesDirected()->get(), 'paginate' => false))
@endif

@if($person->moviesWritten()->get()->count() > 0)
	<h2>Movies written</h2>

	@include('templates.movie-list', array('movies' => $person->moviesWritten()->get(), 'paginate' => false))
@endif

@if($person->episodesWritten()->get()->count() > 0)
	<h2>Episodes written</h2>

	@include('templates.episode-list', array('episodes' => $person->episodesWritten()->get(), 'paginate' => false))
@endif
