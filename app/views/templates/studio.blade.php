<h1>{{$studio->getName()}}</h1><br/>
@if($studio->movies()->count() > 0)
	<h1>Movies</h1>

	@include('templates.movie-list', array('movies' => $studio->movies()->get(), 'paginate' => false))

@endif

@if($studio->tvshows()->count() > 0)
	<h1>TV Shows</h1>

	@include('templates.tvshow-list', array('shows' => $studio->tvshows()->get(), 'paginate' => false))

@endif
