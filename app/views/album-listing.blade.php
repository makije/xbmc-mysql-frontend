@extends('layouts.menu')

@section('content')

	@include('templates.album-list', array('albums' => $albums, 'paginate' => true))

@stop
