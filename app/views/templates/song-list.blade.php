<table>
	<thead>
		<tr>
			<th>Artist</th>
			<th>Album</th>
			<th>Title</th>
		</tr>
	</thead>

	@foreach($songs as $song)
		<tr>
			<td><a href="/artist/{{$song->artist()->first()->idArtist}}">{{$song->artist->first()->strArtist}}</a></td>
			<td><a href="/album/{{$song->album->idAlbum}}">{{$song->album->strAlbum}}</a></td>
			<td><a href="/song/{{$song->idSong}}">{{$song->strTitle}}</a></td>
		</tr>
	@endforeach

</table>

@if($paginate)
	{{ $songs->links() }}
@endif
