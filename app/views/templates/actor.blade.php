<h1>{{ $actor->getName() }}</h1>

@if($actor->getPicture())
	<img src="{{$actor->getPicture()}}" width="100px"/>
@endif

@if($actor->movies()->get()->count() > 0)
	<h2>Movies</h2>

	@include('templates.movie-list', array('movies' => $actor->movies()->paginate(Auth::user()->items_per_page), 'paginate' => true))
@endif

@if($actor->tvshows()->get()->count() > 0)
	<h2>TV Shows</h2>

	@include('templates.tvshow-list', array('shows' => $actor->tvshows()->paginate(Auth::user()->items_per_page), 'paginate' => true))
@endif
