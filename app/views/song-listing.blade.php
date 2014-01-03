@extends('layouts.menu')

@section('content')

	@include('templates.song-list', array('songs' => $songs))

@stop
