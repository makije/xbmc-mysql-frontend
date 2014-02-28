<h1>{{$song->strTitle}}</h1>

<div class="row">
	<div class="small-8 columns">
		<table>
			<tr>
				<td>Artist</td>
				<td><a href="/artist/{{$song->artist()->first()->idArtist}}">{{$song->artist->first()->strArtist}}</a></td>
			</tr>
			<tr>
				<td>Album</td>
				<td><a href="/album/{{$song->album->idAlbum}}">{{$song->album->strAlbum}}</a></td>
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
	</div>

	<div class="small-4 columns">
		@if($song->album->getPreviews())
			<?php
				$previews = $song->album->getPreviews();
			?>
			<p><a href="/album/{{$song->album->idAlbum}}"><img src="{{$previews[0]}}"/></a></p>
		@endif
	</div>
</div>