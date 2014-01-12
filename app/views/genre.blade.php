@extends('layouts.menu')

@section('content')

	@include('templates.genre', array('genre' => $genre))

@stop
