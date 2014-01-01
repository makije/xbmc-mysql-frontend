<table>
	<thead>
		<tr>
			<th>Picture</th>
			<th>Name</th>
		</tr>
	</thead>

	@foreach($actors as $actor)
		<tr>
			<td><a href="/actor/{{$actor->idActor}}" ><img width="100px" src="{{ $actor->getPicture() }}"/></a></td>
			<td><a href="/actor/{{$actor->idActor}}" >{{ $actor->getName() }}</a></td>
		</tr>
	@endforeach

</table>

@if($paginate)
	{{ $actors->links() }}
@endif
