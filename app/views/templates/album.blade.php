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
				{{$song->iTrack}}. {{$song->strTitle}}</br>
			@endforeach
		</td>
	</tr>
</table>
