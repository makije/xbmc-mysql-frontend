<table>
	<thead>
		<tr>
			<th>Name</th>
		</tr>
	</thead>

	@foreach($studios as $studio)
		<tr>
			<td><a href="/studio/{{$studio->idStudio}}" >{{ $studio->getName() }}</a></td>
		</tr>
	@endforeach

</table>

@if($paginate)
	{{ $studios->links() }}
@endif
