@if($movie->poster() || $movie->fanart())
	<div style="width: 500px;">
		<ul class="example-orbit" data-orbit data-options="timer_speed: 3000; pause_on_hover: false;">
			@if($movie->poster() !== false)
				<li>
					<img src="{{$movie->poster()}}"/>
					<div class="orbit-caption">
						Poster
					</div>
				</li>
			@endif
			@if($movie->fanart())
				<li>
					<img src="{{$movie->fanart()}}"/>
					<div class="orbit-caption">
						Fanart
					</div>
				</li>
			@endif
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
	<?php
		$genres = $movie->genres()->get();
		$genreNo = 0;
	?>
	@if($genres->count() > 0)
		<tr>
			<td>Genre(s)</td>
			<td>
				@foreach($genres as $genre)
					<?php $genreNo++ ?>
					<a href="/genre/{{$genre->idGenre}}">{{$genre->getName()}}</a><?php echo ($genreNo < $genres->count() ? ' / ' : '') ?>
				@endforeach
			</td>
		</tr>
	@endif
	<tr>
		<td>Plot</td>
		<td>{{ $movie->c01 }}</td>
	</tr>
	@if($movie->country()->count() > 0)
		<tr>
			<td>Country</td>
			<td><a href="/country/{{$movie->country()->first()->idCountry}}">{{ $movie->country()->first()->getName() }}</a></td>
		</tr>
	@endif
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
	@if($movie->writers()->count() > 0)
		<tr>
			<td>Writer(s)</td>
			<td>
				@foreach($movie->writers as $writer)
					<a href="/person/{{$writer->idActor}}">{{$writer->getName()}}</a>
					<br/>
				@endforeach
			</td>
		</tr>
	@endif
	@if($movie->file->playCount)
		<tr>
			<td>Play count</td>
			<td>{{ $movie->file->playCount }}</td>
		</tr>
	@endif
	@if($movie->file->lastPlayed)
		<tr>
			<td>Last watched</td>
			<td>{{ $movie->file->lastPlayed->toDayDateTimeString() }}</td>
		</tr>
	@endif
	<tr>
		<td>Rating</td>
		<td>{{round($movie->c05, 1)}} ({{$movie->c04}} votes)</td>
	</tr>
	@if($movie->studio()->count() > 0)
		<tr>
			<td>Studio</td>
			<td><a href="/studio/{{$movie->studio()->first()->idStudio}}">{{ $movie->studio()->first()->getName() }}</a></td>
		</tr>
	@endif
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
						Video: {{$streamDetail->strVideoCodec}} {{$streamDetail->iVideoWidth}}x{{$streamDetail->iVideoHeight}} {{gmdate('H:i:s', $streamDetail->iVideoDuration)}}<br/>
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
	<tr>
		<td>Added</td>
		<td>{{ $movie->file->dateAdded->toDayDateTimeString() }}</td>
	</tr>
</table>
