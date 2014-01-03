@extends('layouts.menu')

@section('content')

	@include('templates.song', array('song' => $song))

@stop
