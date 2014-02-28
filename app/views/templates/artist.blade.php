<h1>{{$artist->strArtist}}</h1>

<div class="row">
	<div class="small-8 columns">
		<table>
			@if($artist->strBorn)
					<tr>
						<th>Born</th>
						<td>{{$artist->strBorn}}</td>
					</tr>
			@endif
			@if($artist->strFormed)
				<tr>
					<th>Formed</th>
					<td>{{$artist->strFormed}}</td>
				</tr>
			@endif
			@if($artist->strBiography)
				<tr>
					<th>Biography</th>
					<td>{{$artist->strBiography}}</td>
				</tr>
			@endif
			<tr>
				<th>Genre</th>
				<td>{{$artist->strGenres}}</td>
			</tr>
			@if($artist->strMoods)
				<tr>
					<th>Moods</th>
					<td>{{$artist->strMoods}}</td>
				</tr>
			@endif
			@if($artist->strStyles)
				<tr>
					<th>Styles</th>
					<td>{{$artist->strStyles}}</td>
				</tr>
			@endif
		</table>
	</div>

	<div class="small-4 columns">
		@if($artist->getPreviews())
			<?php
				$previews = $artist->getPreviews();
			?>
			<p><img src="{{$previews[0]}}"/></p>
		@endif
	</div>
</div>

<h2>Albums</h2>
@include('templates.album-list', array('albums' => $artist->albums()->get(), 'paginate' => false))