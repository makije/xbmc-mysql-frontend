@extends('layouts.menu')

@section('content')

	@include('templates.person', array('person' => $person))

@stop
