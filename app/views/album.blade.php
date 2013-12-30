@extends('layouts.menu')

@section('content')

	@include('templates.album', array('album' => $album))

@stop
