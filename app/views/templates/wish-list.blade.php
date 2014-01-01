<table>
	<thead>
		<tr>
			<th>Title</th><th>Type</th><th>Edit</th>
		</tr>
	</thead>

	@foreach($wishes as $wish)
		<tr>
			<td><a href="/wish/{{$wish->id}}" >{{ $wish->title }}</a></td>
			<td>{{ ucwords($wish->type) }}</td>
			<td><a href="/wish/{{$wish->id}}/edit">Edit<a/></td>
		</tr>
	@endforeach

</table>

@if($paginate)
	{{ $wishes->links() }}
@endif
