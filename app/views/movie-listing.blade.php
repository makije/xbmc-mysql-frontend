@extends('layouts.menu')

@section('content')

	@include('templates.movie-list', array('movies' => $movies, 'paginate' => true))

@stop
