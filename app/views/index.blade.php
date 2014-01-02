@extends('layouts.menu')

@section('content')

	<h1>Database stats</h1><br/>
	{{ Actor::all()->count() }} <a href="actor">actors</a><br/>
	{{ Movie::all()->count() }} <a href="movie">movies</a> in {{ MovieSet::all()->count() }} <a href="movieset">sets</a><br/>
	{{ TVShow::all()->count() }} <a href="tvshow">tv shows</a> with {{ Episode::all()->count() }} episodes<br/>
	{{ Artist::all()->count() }} <a href="artist">artists</a> with {{ Album::all()->count() }} <a href="album">albums</a> containing {{ Song::all()->count() }} songs

@stop
