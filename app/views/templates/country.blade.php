<h1>{{$country->getName()}}</h1><br/>
@if($country->movies()->count() > 0)
	<h1>Movies</h1>

	@include('templates.movie-list', array('movies' => $country->movies()->paginate(Auth::user()->items_per_page), 'paginate' => true))

@endif
