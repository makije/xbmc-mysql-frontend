@if($movie->getPosters())
	<?php
		$number = 0;
	?>
	<div style="width: 500px;">
		<ul class="example-orbit" data-orbit data-options="timer_speed: 3000; pause_on_hover: false;">
			@foreach($movie->getPosters() as $poster)
				<li>
					<img src="{{$poster}}"/>
				</li>

				<?php
					$number++;

					if($number >= Config::get('app.maxImages'))
						break;
				?>

			@endforeach
		</ul>
	</div>
@endif
<table>
	<tr>
		<td>Name</td>
		<td>
			<a href="http://www.imdb.com/title/{{$movie->c09}}" target="_blank">{{ $movie->getName() }}</a><br/>
			{{$movie->c12}}
		</td>
	</tr>
	<tr>
		<td>Genre(s)</td>
		<td>{{$movie->c14}}</td>
	</tr>
	<tr>
		<td>Plot</td>
		<td>{{ $movie->c01 }}</td>
	</tr>
	<tr>
		<td>Country</td>
		<td>{{ $movie->c21 }}</td>
	</tr>
	@if($movie->actors()->get()->count() > 0)
		<tr>
			<td>Actors</td>
			<td>
				@foreach($movie->actors as $actor)
					<a href="/person/{{$actor->idActor}}">{{$actor->strActor}}</a>
					@if($actor->pivot->strRole)
						as {{$actor->pivot->strRole}}
					@endif
					<br/>
				@endforeach
			</td>
		</tr>
	@endif
	@if($movie->directors()->count() > 0)
		<tr>
			<td>Director(s)</td>
			<td>
				@foreach($movie->directors as $director)
					<a href="/person/{{$director->idActor}}">{{$director->getName()}}</a>
					<br/>
				@endforeach
			</td>
		</tr>
	@endif
	<tr>
		<td>Rating</td>
		<td>{{round($movie->c05, 1)}} (Votes {{$movie->c04}})</td>
	</tr>
	<?php
		$set = $movie->set()->first();
	?>
	@if($set)
		<tr>
			<td>Part of</td>
			<td><a href="/movieset/{{$set->idSet}}">{{$set->getName()}}</a></td>
		</tr>
	@endif
	@if($movie->streamDetails()->get()->count() > 0)
		<tr>
			<td>Stream Details</td>
			<td>
				@foreach($movie->streamDetails()->get() as $streamDetail)
					@if($streamDetail->iStreamType == 0)
						Video: {{$streamDetail->strVideoCodec}} {{$streamDetail->iVideoWidth}}x{{$streamDetail->iVideoHeight}} {{round($streamDetail->iVideoDuration / 60)}}min<br/>
					@endif
					@if($streamDetail->iStreamType == 1)
						Audio: {{$streamDetail->strAudioCodec}} {{$streamDetail->iAudioChannels}} {{$streamDetail->strAudioLanguage}}<br/>
					@endif
					@if($streamDetail->iStreamType == 2)
						Subtitle: {{$streamDetail->strSubtitleLanguage}}<br/>
					@endif
				@endforeach
			</td>
		</tr>
	@endif
	<tr>
		<td>Path</td>
		<td>
			@if(Config::get('app.downloads'))
				<a href="/movie/{{$movie->idMovie}}/download">
			@endif

			{{ $movie->getDownloadPath() }}

			@if(Config::get('app.downloads'))
				</a>
			@endif
		</td>
	</tr>
</table>
