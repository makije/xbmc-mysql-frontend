@extends('layouts.menu')

@section('content')

	@include('templates.studio-list', array('studios' => $studios, 'paginate' => true))

@stop
