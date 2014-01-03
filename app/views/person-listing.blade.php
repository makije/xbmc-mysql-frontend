@extends('layouts.menu')

@section('content')

	@include('templates.person-list', array('persons' => $persons, 'paginate' => true))

@stop
