<table>
	<thead>
		<tr>
			<th>Title</th><th>Type</th><th>Edit</th><th>Added on</th>
		</tr>
	</thead>

	@foreach($wishes as $wish)
		<tr>
			<td><a href="/wish/{{$wish->id}}" >{{ $wish->title }}</a></td>
			<td>{{ trans('types.' . $wish->type) }}</td>
			<td><a href="/wish/{{$wish->id}}/edit">Edit<a/></td>
			<td>{{ $wish->created_at }}</td>
		</tr>
	@endforeach

</table>

@if($paginate)
	{{ $wishes->links() }}
@endif
