<table>
	<thead>
		<tr>
			<th>Name</th>
		</tr>
	</thead>

	@foreach($genres as $genre)
		<tr>
			<td><a href="/genre/{{$genre->idGenre}}" >{{ $genre->getName() }}</a></td>
		</tr>
	@endforeach

</table>

@if($paginate)
	{{ $genres->links() }}
@endif
