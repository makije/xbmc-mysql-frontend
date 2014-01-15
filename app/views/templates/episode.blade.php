@if($episode->getPreview())
	<img src="{{$episode->getPreview()}}"/>
	<br/><br/>
@endif
<table>
	<tr>
		<td>TV Show</td>
		<td><a href="/tvshow/{{$episode->tvshow()->first()->idShow}}">{{ $episode->tvshow()->first()->getName() }}</a></td>
	</tr>
	<tr>
		<td>Episode</td>
		<td>{{ $episode->getName() }}</td>
	<tr>
		<td>Plot</td>
		<td>{{ $episode->c01 }}</td>
	</tr>
	<tr>
		<td>Video</td>
		<td>
			@foreach($episode->video()->get() as $streamDetail)
				{{ trans('formats.' . $streamDetail->strVideoCodec) }} {{$streamDetail->iVideoWidth}}x{{$streamDetail->iVideoHeight}} {{gmdate('H:i:s', $streamDetail->iVideoDuration)}}<br/>
			@endforeach
		</td>
	</tr>
	<tr>
		<td>Audio</td>
		<td>
			@foreach($episode->audio()->get() as $streamDetail)
				@if($streamDetail->strAudioLanguage && strlen($streamDetail->strAudioLanguage) > 0) {{ trans('language.' . $streamDetail->strAudioLanguage) }} / @endif {{ trans('formats.' . $streamDetail->strAudioCodec) }} / {{$streamDetail->iAudioChannels}} Channels<br/>
			@endforeach
		</td>
	</tr>
	<tr>
		<td>Subtitles</td>
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
			<td>Actors</td>
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
			<td>Director(s)</td>
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
			<td>Writer(s)</td>
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
			<td>Play count</td>
			<td>{{ $episode->file->playCount }}</td>
		</tr>
	@endif
	@if($episode->file->lastPlayed)
		<tr>
			<td>Last watched</td>
			<td>{{ $episode->file->lastPlayed->toDayDateTimeString() }}</td>
		</tr>
	@endif
	<tr>
		<td>Path</td>
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
		<td>Added</td>
		<td>{{ $episode->file->dateAdded->toDayDateTimeString() }}</td>
	</tr>
</table>
