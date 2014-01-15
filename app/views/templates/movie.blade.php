@if($movie->poster() || $movie->fanart())
	<div style="width: 440px;">
		<ul class="clearing-thumbs" data-clearing>
			@if($movie->poster())
				<li><a class="th" href="{{$movie->poster()}}"><img width="200px" data-caption="Poster" src="{{$movie->poster()}}"></a></li>
			@endif
			@if($movie->fanart())
				<li><a class="th" href="{{$movie->fanart()}}"><img width="200px" data-caption="Fanart" src="{{$movie->fanart()}}"></a></li>
			@endif
		</ul>
	</div>
	<br/><br/>
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
	<tr>
		<td>Video</td>
		<td>
			@foreach($movie->video()->get() as $streamDetail)
				{{ trans('formats.' . $streamDetail->strVideoCodec) }} {{$streamDetail->iVideoWidth}}x{{$streamDetail->iVideoHeight}} {{gmdate('H:i:s', $streamDetail->iVideoDuration)}}<br/>
			@endforeach
		</td>
	</tr>
	<tr>
		<td>Audio</td>
		<td>
			@foreach($movie->audio()->get() as $streamDetail)
				@if($streamDetail->strAudioLanguage && strlen($streamDetail->strAudioLanguage) > 0) {{ trans('language.' . $streamDetail->strAudioLanguage) }} / @endif {{ trans('formats.' . $streamDetail->strAudioCodec) }} / {{$streamDetail->iAudioChannels}} Channels<br/>
			@endforeach
		</td>
	</tr>
	<tr>
		<td>Subtitles</td>
		<td>
			@foreach($movie->subtitles()->get() as $streamDetail)
				@if($streamDetail->strSubtitleLanguage)
					{{ trans('language.' . $streamDetail->strSubtitleLanguage) }}<br/>
				@endif
			@endforeach
		</td>
	</tr>
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
