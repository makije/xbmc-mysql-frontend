@if($artist->getPreviews())
	<?php
		$previews = $artist->getPreviews();
	?>
	<img src="{{$previews[0]}}"/>
	<br/><br/>
@endif
<table>
	<tr>
		<td>Name</td>
		<td>{{ $artist->strArtist }}</td>
	</tr>
		@if($artist->strBorn)
			<tr>
				<td>Born</td>
				<td>{{$artist->strBorn}}</td>
			</tr>
	@endif
	@if($artist->strFormed)
		<tr>
			<td>Formed</td>
			<td>{{$artist->strFormed}}</td>
		</tr>
	@endif
	@if($artist->strBiography)
		<tr>
			<td>Biography</td>
			<td>{{$artist->strBiography}}</td>
		</tr>
	@endif
	<tr>
		<td>Genre</td>
		<td>{{$artist->strGenres}}</td>
	</tr>
	@if($artist->strMoods)
		<tr>
			<td>Moods</td>
			<td>{{$artist->strMoods}}</td>
		</tr>
	@endif
	@if($artist->strStyles)
		<tr>
			<td>Styles</td>
			<td>{{$artist->strStyles}}</td>
		</tr>
	@endif
	<tr>
		<td>Albums</td>
		<td>
			@foreach($artist->albums()->get() as $album)
				<a href="/album/{{$album->idAlbum}}">{{$album->strAlbum}}</a></br>
			@endforeach
		</td>
	</tr>
</table>
