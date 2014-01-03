@if($album->getPreviews())
	<?php
		$previews = $album->getPreviews();
	?>
	<img src="{{$previews[0]}}"/>
	<br/><br/>
@endif
<table>
	<tr>
		<td>Name</td>
		<td>{{ $album->strAlbum }}</td>
	</tr>
	<tr>
		<td>Songs</td>
		<td>
			@foreach($album->songs()->get() as $song)
				<a href="/song/{{$song->idSong}}">{{$song->iTrack}}. {{$song->strTitle}}</a></br>
			@endforeach
		</td>
	</tr>
</table>
