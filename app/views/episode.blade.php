@extends('layouts.menu')

@section('content')

	@include('templates.episode', array('episode' => $episode))

@stop
