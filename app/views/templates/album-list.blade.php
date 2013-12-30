<table>
	<thead>
		<tr>
			<th>Preview</th>
			<th>Name</th>
		</tr>
	</thead>

	@foreach($albums as $album)
			<?php
				if(!$album->strAlbum)
					continue;
				$previews = $album->getPreviews();
			?>
			<td><a href="/album/{{$album->idAlbum}}"><img src="{{$previews[0]}}"/></a></td>
			<td><a href="/album/{{$album->idAlbum}}">{{ $album->strAlbum }}</a></td>
		</tr>
	@endforeach

</table>

@if($paginate)
	{{ $albums->links() }}
@endif
