@extends('layouts.menu')

@section('content')

	@include('templates.actor-list', array('actors' => $actors, 'paginate' => true))

@stop
