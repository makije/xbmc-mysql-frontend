@extends('layouts.menu')

@section('content')

	@include('templates.artist', array('artist' => $artist))

@stop
