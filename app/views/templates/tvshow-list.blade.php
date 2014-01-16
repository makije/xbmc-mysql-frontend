<table>
	<thead>
		<tr>
			<th>Poster</th>
			<th>Name</th>
		</tr>
	</thead>

	@foreach($shows as $show)
		<tr>
			<td><a href="/tvshow/{{$show->idShow}}" ><img width="300px" src="{{ $show->banner() }}"/></a></td>
			<td><a href="/tvshow/{{$show->idShow}}" >{{ $show->getName() }}</a> @if(isset($as)) as {{ $show->pivot->strRole }} @endif</td>
		</tr>
	@endforeach

</table>

@if($paginate)
	{{ $shows->links() }}
@endif
