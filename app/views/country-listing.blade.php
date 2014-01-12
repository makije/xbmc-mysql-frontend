@extends('layouts.menu')

@section('content')

	@include('templates.country-list', array('countries' => $countries, 'paginate' => true))

@stop
