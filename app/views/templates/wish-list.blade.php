<table>
	<thead>
		<tr>
			<th>Title</th><th>Type</th>
		</tr>
	</thead>

	@foreach($wishes as $wish)
		<tr>
			<td><a href="/wish/{{$wish->id}}" >{{ $wish->title }}</a></td>
			<td>{{ ucwords($wish->type) }}</td>
		</tr>
	@endforeach

</table>

@if($paginate)
	{{ $wishes->links() }}
@endif
