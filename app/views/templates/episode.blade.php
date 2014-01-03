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
</table>
