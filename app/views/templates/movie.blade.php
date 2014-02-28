@if(Config::get('app.aliasBeforeName'))
	<h1>{{ $movie->getAlias() }} ({{ $movie->getYear() }})</h1>
@else
	<h1>{{ $movie->getName() }} ({{ $movie->getYear() }})</h1>
@endif

<div class="row">

	<div class="small-8 columns">
		<table>
			<tr>
				@if(Config::get('app.aliasBeforeName'))
					<th style="width:20%;">Name</th>
					<td><a href="http://www.imdb.com/title/{{$movie->c09}}" target="_blank">{{ $movie->getName() }}</a><br/></td>
				@else
					<th>Original name</th>
					<td><a href="http://www.imdb.com/title/{{$movie->c09}}" target="_blank">{{ $movie->getAlias() }}</a><br/></td>
				@endif
			</tr>
			<tr>
				<th>Rating</th>
				<td>{{$movie->getRating() ? $movie->getRating() : 'Not rated'}}</td>
			</tr>
			<?php
				$genres = $movie->genres()->get();
				$genreNo = 0;
			?>
			@if($genres->count() > 0)
				<tr>
					<th>Genre(s)</th>
					<td>
						@foreach($genres as $genre)
							<?php $genreNo++ ?>
							<a href="/genre/{{$genre->idGenre}}">{{$genre->getName()}}</a><?php echo ($genreNo < $genres->count() ? ' / ' : '') ?>
						@endforeach
					</td>
				</tr>
			@endif
			<tr>
				<th>Plot</th>
				<td>{{ $movie->c01 }}</td>
			</tr>
			@if($movie->country()->count() > 0)
				<tr>
					<th>Country</th>
					<td><a href="/country/{{$movie->country()->first()->idCountry}}">{{ $movie->country()->first()->getName() }}</a></td>
				</tr>
			@endif
			@if($movie->actors()->get()->count() > 0)
				<tr>
					<th>Actors</th>
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
					<th>Director(s)</th>
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
					<th>Writer(s)</th>
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
					<th>Play count</th>
					<td>{{ $movie->file->playCount }}</td>
				</tr>
			@endif
			@if($movie->file->lastPlayed)
				<tr>
					<th>Last watched</th>
					<td>{{ $movie->file->lastPlayed->toDayDateTimeString() }}</td>
				</tr>
			@endif
			<tr>
				<th>Rating</th>
				<td>{{round($movie->c05, 1)}} ({{$movie->c04}} votes)</td>
			</tr>
			@if($movie->studio()->count() > 0)
				<tr>
					<th>Studio</th>
					<td><a href="/studio/{{$movie->studio()->first()->idStudio}}">{{ $movie->studio()->first()->getName() }}</a></td>
				</tr>
			@endif
			<?php
				$set = $movie->set()->first();
			?>
			@if($set)
				<tr>
					<th>Part of</th>
					<td><a href="/movieset/{{$set->idSet}}">{{$set->getName()}}</a></td>
				</tr>
			@endif
			<tr>
				<th>Video</th>
				<td>
					@foreach($movie->video()->get() as $streamDetail)
						{{ trans('formats.' . $streamDetail->strVideoCodec) }} {{$streamDetail->iVideoWidth}}x{{$streamDetail->iVideoHeight}} {{gmdate('H:i:s', $streamDetail->iVideoDuration)}}<br/>
					@endforeach
				</td>
			</tr>
			<tr>
				<th>Audio</th>
				<td>
					@foreach($movie->audio()->get() as $streamDetail)
						@if($streamDetail->strAudioLanguage && strlen($streamDetail->strAudioLanguage) > 0) {{ trans('language.' . $streamDetail->strAudioLanguage) }} / @endif {{ trans('formats.' . $streamDetail->strAudioCodec) }} / {{$streamDetail->iAudioChannels}} Channels<br/>
					@endforeach
				</td>
			</tr>
			<tr>
				<th>Subtitles</th>
				<td>
					@foreach($movie->subtitles()->get() as $streamDetail)
						@if($streamDetail->strSubtitleLanguage)
							{{ trans('language.' . $streamDetail->strSubtitleLanguage) }}<br/>
						@endif
					@endforeach
				</td>
			</tr>
			<tr>
				<th>Path</th>
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
				<th>Added</th>
				<td>{{ $movie->file->dateAdded->toDayDateTimeString() }}</td>
			</tr>
		</table>
	</div>

	<div class="small-4 columns">
		@if($movie->poster() || $movie->fanart())
			<ul class="clearing-thumbs" data-clearing>
				@if($movie->poster())
					<li><a class="th" href="{{$movie->poster()}}"><img width="200px" data-caption="Poster" src="{{$movie->poster()}}"></a></li>
				@endif
				@if($movie->fanart())
					<li><a class="th" href="{{$movie->fanart()}}"><img width="200px" data-caption="Fanart" src="{{$movie->fanart()}}"></a></li>
				@endif
			</ul>
		@endif
	</div>
</div>