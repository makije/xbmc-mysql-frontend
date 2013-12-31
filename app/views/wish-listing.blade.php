@extends('layouts.menu')

@section('content')

	@include('templates.wish-list', array('wishes' => $wishes, 'paginate' => true))

@stop
