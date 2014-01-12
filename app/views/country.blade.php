@extends('layouts.menu')

@section('content')

	@include('templates.country', array('country' => $country))

@stop
