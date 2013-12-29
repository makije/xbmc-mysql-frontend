@extends('layouts.menu')

@section('content')

	@include('templates.movie', array('movie' => $movie))

@stop
