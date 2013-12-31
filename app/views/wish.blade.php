@extends('layouts.menu')

@section('content')

	@include('templates.wish', array('wish' => $wish))

@stop
