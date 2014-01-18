@extends('layouts.menu')

@section('content')

	<h1>{{$set->getName()}}</h1>

	@if($set->poster() || $set->fanart())
		<div style="width: 440px;">
			<ul class="clearing-thumbs" data-clearing>
				@if($set->poster())
					<li><a class="th" href="{{$set->poster()}}"><img width="200px" data-caption="Poster" src="{{$set->poster()}}"></a></li>
				@endif
				@if($set->fanart())
					<li><a class="th" href="{{$set->fanart()}}"><img width="200px" data-caption="Fanart" src="{{$set->fanart()}}"></a></li>
				@endif
			</ul>
		</div>
		<br/><br/>
	@endif

	<h1>Movies in set</h1>

	@include('templates.movie-list', array('movies' => $set->movies()->orderBy('c07')->get(), 'paginate' => false))

@stop
