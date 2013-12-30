<table>
	<thead>
		<tr>
			<th>Preview</th>
			<th>Name</th>
		</tr>
	</thead>

	@foreach($artists as $artist)
			<?php
				$previews = $artist->getPreviews();
			?>
			<td><a href="/artist/{{$artist->idArtist}}"><img src="{{$previews[0]}}"/></a></td>
			<td><a href="/artist/{{$artist->idArtist}}">{{ $artist->strArtist }}</a></td>
		</tr>
	@endforeach

</table>

@if($paginate)
	{{ $artists->links() }}
@endif
