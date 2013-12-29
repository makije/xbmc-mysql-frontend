@extends('layouts.menu')

@section('content')

	@include('templates.tvshow-list', array('shows' => $shows, 'paginate' => true))

@stop
