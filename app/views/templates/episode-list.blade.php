<table>
	<thead>
		<tr>
			<th>Show</th>
			<th>Poster</th>
			<th>Name</th>
		</tr>
	</thead>

	@foreach($episodes as $episode)
		<tr>
			<td><a href="/tvshow/{{$episode->tvshow->idShow}}">{{$episode->tvshow->getName()}}</a></td>
			<td><a href="/episode/{{$episode->idEpisode}}" ><img width="100px" src="{{ $episode->getPreview() }}"/></a></td>
			<td><a href="/episode/{{$episode->idEpisode}}" >{{ $episode->getName() }}</a></td>
		</tr>
	@endforeach

</table>

@if($paginate)
	{{ $episodes->links() }}
@endif
