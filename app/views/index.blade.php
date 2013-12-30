@extends('layouts.menu')

@section('content')

	Currently there is {{ Movie::all()->count() }} <a href="movie">movies</a> in {{ MovieSet::all()->count() }} <a href="movieset">sets</a><br/>
	Currently there is {{ TVShow::all()->count() }} <a href="tvshow">tv shows</a> with {{ Episode::all()->count() }} episodes<br/>
	Current there is {{ Artist::all()->count() }} <a href="artist">artist</a> with {{ Album::all()->count() }} <a href="album">albums</a> containing {{ Song::all()->count() }} songs

@stop
