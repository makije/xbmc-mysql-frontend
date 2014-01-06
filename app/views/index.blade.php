@extends('layouts.menu')

@section('content')

	<h1>Database stats</h1><br/>
	{{ Person::all()->count() }} <a href="person">persons</a><br/>
	{{ Movie::all()->count() }} <a href="movie">movies</a> in {{ MovieSet::all()->count() }} <a href="movieset">sets</a><br/>
	{{ TVShow::all()->count() }} <a href="tvshow">tv shows</a> with {{ Episode::all()->count() }} episodes<br/>
	{{ Artist::all()->count() }} <a href="artist">artists</a> with {{ Album::all()->count() }} <a href="album">albums</a> containing {{ Song::all()->count() }} songs<br/><br/>

	<?php
		$newMovies = Movie::whereHas('file', function($q)
		{
			$q->where('dateAdded', '>', Auth::user()->last_login);
		})->count();
	?>

	@if($newMovies > 1)
		There is {{ $newMovies }} <a href="/movie/latest">new</a> movies since last login
	@endif
@stop
