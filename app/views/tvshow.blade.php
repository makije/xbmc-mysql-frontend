@extends('layouts.menu')

@section('content')

	@include('templates.tvshow', array('show' => $show))

@stop
