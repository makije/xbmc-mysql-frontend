<table>
	<thead>
		<tr>
			<th>Poster</th>
			<th>Name</th>
		</tr>
	</thead>

	@foreach($movies as $movie)
		<tr>
			<td><a href="/movie/{{$movie->idMovie}}" ><img width="100px" src="{{ $movie->poster() }}"/></a></td>
			<td><a href="/movie/{{$movie->idMovie}}" >{{ $movie->getName() }}</a> @if(isset($as)) as {{ $movie->pivot->strRole }} @endif</td>
		</tr>
	@endforeach

</table>

@if($paginate)
	{{ $movies->links() }}
@endif
