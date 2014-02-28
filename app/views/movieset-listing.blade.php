@extends('layouts.menu')

@section('content')

	<div class="row">
		<?php $i = 1; ?>
		@foreach($movieSets as $set)
			<div class="medium-3 columns @if((count($movieSets) == $i) && (count($movieSets) % 4 != 0)) end @endif">
				<div class="list-image">
					<a href="/movieset/{{$set->idSet}}">
						<img src="{{$set->poster()}}"/>
						<div class="count">{{$set->movies->count()}}</div>
					</a>
				</div>
				<p class="list-title"><a href="/movieset/{{$set->idSet}}" >{{ $set->getName() }}</a></p>

				@if($i++ % 4 == 0)
					</div><div class="row">
				@endif
			</div>
		@endforeach
	</div>

	{{ $movieSets->links() }}

@stop