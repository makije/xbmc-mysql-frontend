<table>
	<thead>
		<tr>
			<th>Picture</th>
			<th>Name</th>
		</tr>
	</thead>

	@foreach($persons as $person)
		<tr>
			<td><a href="/person/{{$person->idActor}}" ><img width="100px" src="{{ $person->thumb() }}"/></a></td>
			<td><a href="/person/{{$person->idActor}}" >{{ $person->getName() }}</a></td>
		</tr>
	@endforeach

</table>

@if($paginate)
	{{ $persons->links() }}
@endif
