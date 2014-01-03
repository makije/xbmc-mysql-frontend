<h1>{{ $person->getName() }}</h1>

@if($person->getPicture())
	<img src="{{$person->getPicture()}}" width="100px"/>
@endif

@if($person->moviesActed()->get()->count() > 0)
	<h2>Movie(s)</h2>

	@include('templates.movie-list', array('movies' => $person->moviesActed()->get(), 'paginate' => false))
@endif

@if($person->tvshowsActed()->get()->count() > 0)
	<h2>TV Show(s)</h2>

	@include('templates.tvshow-list', array('shows' => $person->tvshowsActed()->get(), 'paginate' => false))
@endif

@if($person->moviesDirected()->get()->count() > 0)
	<h2>Movies directed</h2>

	@include('templates.movie-list', array('movies' => $person->moviesDirected()->get(), 'paginate' => false))
@endif

@if($person->episodesDirected()->get()->count() > 0)
	<h2>Episodes directed</h2>

	@include('templates.episode-list', array('episodes' => $person->episodesDirected()->get(), 'paginate' => false))
@endif
