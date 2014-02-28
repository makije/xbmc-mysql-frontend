<h1>{{ $album->strAlbum }}</h1>

<div class="row">
	<div class="small-8 columns">
		<table>
			<?php $artist = $album->artists->first(); ?>
			@if($artist)
				<tr>
					<td>Artist</td>
					<td><a href="/artist/{{$artist->idArtist}}">{{ $artist->strArtist }}</a></td>
				</tr>
			@endif
			<tr>
				<td>Songs</td>
				<td>
					@foreach($album->songs()->get() as $song)
						<a href="/song/{{$song->idSong}}">{{$song->iTrack}}. {{$song->strTitle}}</a></br>
					@endforeach
				</td>
			</tr>
		</table>
	</div>

	<div class="small-4 columns">
		@if($album->getPreviews())
			<?php
				$previews = $album->getPreviews();
			?>
			<p><img src="{{$previews[0]}}"/></p>
		@endif
	</div>
</div>