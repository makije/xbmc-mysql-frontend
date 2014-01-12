@extends('layouts.menu')

@section('content')

	@include('templates.genre-list', array('genres' => $genres, 'paginate' => true))

@stop
