@extends('layouts.menu')

@section('content')

	<h1>{{$set->getName()}}</h1>

	@include('templates.movie-list', array('movies' => $set->movies()->orderBy('c07')->get(), 'paginate' => false))

@stop
