<table>
	<tr>
		<td>Title</td>
		<td>{{ $song->strTitle }}</td>
	</tr>
	<tr>
		<td>Duration</td>
		<td>{{ gmdate($song->iDuration > 3600 ? 'H:i:s' : 'i:s', $song->iDuration) }}</td>
	</tr>
	<tr>
		<td>Path</td>
		<td>
			@if(Config::get('app.downloads'))
				<a href="/song/{{$song->idSong}}/download">
			@endif
					{{ $song->path->getPath() . $song->strFileName }}
			@if(Config::get('app.downloads'))
				</a>
			@endif
		</td>
	</tr>
</table>
