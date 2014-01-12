<h1>{{$genre->getName()}}</h1><br/>
@if($genre->movies()->count() > 0)
	<h1>Movies</h1>

	@include('templates.movie-list', array('movies' => $genre->movies()->paginate(Auth::user()->item_per_page), 'paginate' => true))

@endif

@if($genre->tvshows()->count() > 0)
	<h1>TV Shows</h1>

	@include('templates.tvshow-list', array('shows' => $genre->tvshows()->paginate(Auth::user()->items_per_page), 'paginate' => true))

@endif
