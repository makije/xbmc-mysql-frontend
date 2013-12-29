@extends('layouts.menu')

@section('content')

	@include('templates.episode-list', array('episodes' => $episodes, 'paginate' => false))

@stop
