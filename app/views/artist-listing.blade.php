@extends('layouts.menu')

@section('content')

	@include('templates.artist-list', array('artists' => $artists, 'paginate' => true))

@stop
