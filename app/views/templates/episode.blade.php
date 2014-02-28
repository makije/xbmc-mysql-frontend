<h1>{{ $episode->getName() }}</h1>

<div class="row">
	<div class="small-8 columns">
		<table>
			<tr>
				<th>TV Show</th>
				<td><a href="/tvshow/{{$episode->tvshow()->first()->idShow}}">{{ $episode->tvshow()->first()->getName() }}</a></td>
			</tr>
			<tr>
				<th>Season</th>
				<td>{{ $episode->c12 }}</td>
			</tr>
			<tr>
				<th>Episode</th>
				<td>{{ $episode->c13 }}</td>
			</tr>
			<tr>
				<th>Plot</th>
				<td>{{ $episode->c01 }}</td>
			</tr>
			<tr>
				<th>Video</th>
				<td>
					@foreach($episode->video()->get() as $streamDetail)
						{{ trans('formats.' . $streamDetail->strVideoCodec) }} {{$streamDetail->iVideoWidth}}x{{$streamDetail->iVideoHeight}} {{gmdate('H:i:s', $streamDetail->iVideoDuration)}}<br/>
					@endforeach
				</td>
			</tr>
			<tr>
				<th>Audio</th>
				<td>
					@foreach($episode->audio()->get() as $streamDetail)
						@if($streamDetail->strAudioLanguage && strlen($streamDetail->strAudioLanguage) > 0) {{ trans('language.' . $streamDetail->strAudioLanguage) }} / @endif {{ trans('formats.' . $streamDetail->strAudioCodec) }} / {{$streamDetail->iAudioChannels}} Channels<br/>
					@endforeach
				</td>
			</tr>
			<tr>
				<th>Subtitles</th>
				<td>
					@foreach($episode->subtitles()->get() as $streamDetail)
						@if($streamDetail->strSubtitleLanguage)
							{{ trans('language.' . $streamDetail->strSubtitleLanguage) }}<br/>
						@endif
					@endforeach
				</td>
			</tr>
			@if($episode->actors()->get()->count() > 0)
				<tr>
					<th>Actors</th>
					<td>
						@foreach($episode->actors as $actor)
							<a href="/person/{{$actor->idActor}}">{{$actor->strActor}}</a>
							@if($actor->pivot->strRole)
								as {{$actor->pivot->strRole}}
							@endif
							<br/>
						@endforeach
					</td>
				</tr>
			@endif
			@if($episode->directors()->count() > 0)
				<tr>
					<th>Director(s)</th>
					<td>
						@foreach($episode->directors as $director)
							<a href="/person/{{$director->idActor}}">{{$director->getName()}}</a>
							<br/>
						@endforeach
					</td>
				</tr>
			@endif
			@if($episode->writers()->count() > 0)
				<tr>
					<th>Writer(s)</th>
					<td>
						@foreach($episode->writers as $writer)
							<a href="/person/{{$writer->idActor}}">{{$writer->getName()}}</a>
							<br/>
						@endforeach
					</td>
				</tr>
			@endif
			@if($episode->file->playCount)
				<tr>
					<th>Play count</th>
					<td>{{ $episode->file->playCount }}</td>
				</tr>
			@endif
			@if($episode->file->lastPlayed)
				<tr>
					<th>Last watched</th>
					<td>{{ $episode->file->lastPlayed->toDayDateTimeString() }}</td>
				</tr>
			@endif
			<tr>
				<th>Path</th>
				<td>
					@if(Config::get('app.downloads'))
						<a href="/episode/{{$episode->idEpisode}}/download">
					@endif

					{{ $episode->getDownloadPath() }}

					@if(Config::get('app.downloads'))
						</a>
					@endif
				</td>
			</tr>
			<tr>
				<th>Added</th>
				<td>{{ $episode->file->dateAdded->toDayDateTimeString() }}</td>
			</tr>
		</table>
	</div>

	<div class="small-4 columns">
		@if($episode->getPreview())
			<p><img src="{{$episode->getPreview()}}"/></p>
		@endif
	</div>
</div>