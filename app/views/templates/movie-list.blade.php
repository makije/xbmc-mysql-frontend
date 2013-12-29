<table>
	<thead>
		<tr>
			<th>Poster</th>
			<th>Name</th>
		</tr>
	</thead>

	@foreach($movies as $movie)
		<?php
			$posters = $movie->getPosters();
		?>
		<tr>
			<td><a href="/movie/{{$movie->idMovie}}" ><img width="100px" src="{{ $posters[0] }}"/></a></td>
			<td><a href="/movie/{{$movie->idMovie}}" >{{ $movie->getName() }}</a></td>
		</tr>
	@endforeach

</table>

@if($paginate)
	{{ $movies->links() }}
@endif
