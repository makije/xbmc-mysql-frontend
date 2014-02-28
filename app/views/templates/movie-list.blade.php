<div class="row">
	<?php $i = 1; ?>
	@foreach($movies as $movie)
		<div class="medium-3 columns @if((count($movies) == $i) && (count($movies) % 4 != 0)) end @endif">
			<div class="list-image"><a href="/movie/{{$movie->idMovie}}"><img src="{{ $movie->poster() }}"/></a></div>

			@if(Config::get('app.aliasBeforeName') && $movie->hasAlias())
				<p class="list-title"><a href="/movie/{{$movie->idMovie}}">{{ $movie->getAlias() }} ({{ $movie->getYear() }})<br>{{$movie->getName()}}</a></p>
			@elseif($movie->hasAlias())
				<p class="list-title"><a href="/movie/{{$movie->idMovie}}">{{ $movie->getName() }} ({{ $movie->getYear() }})<br>{{$movie->getAlias()}}</a></p>
			@else
				<p class="list-title"><a href="/movie/{{$movie->idMovie}}">{{ $movie->getName() }} ({{ $movie->getYear() }})</a></p>
			@endif

		</div>

		@if($i++ % 4 == 0)
			</div><div class="row">
		@endif
	@endforeach
</div>

@if($paginate)
	{{ $movies->links() }}
@endif
