<h1>{{$show->getName()}}</h1>

<div class="row">
	<div class="small-8 columns">
		<table>
			<tr>
				<td>Name</td>
				<td><a href="http://thetvdb.com/?tab=series&id={{$show->getTTVDBID()}}" target="_blank">{{ $show->getName() }}</a></td>
			</tr>
			<tr>
				<td>Plot</td>
				<td>{{ $show->c01 }}</td>
			</tr>
			<tr>
				<td>Rating</td>
				<td>{{round($show->c04, 1)}}</td>
			</tr>
			@if($show->studio()->count() > 0)
				<tr>
					<td>Studio</td>
					<td><a href="/studio/{{$show->studio()->first()->idStudio}}">{{ $show->studio()->first()->getName() }}</a></td>
				</tr>
			@endif
			<?php
				$genres = $show->genres()->get();
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
				<td>Actors</td>
				<td>
					@foreach($show->actors()->get() as $actor)
						<a href="/person/{{$actor->idActor}}">{{$actor->strActor}}</a>
						@if($actor->pivot->strRole)
							as {{$actor->pivot->strRole}}
						@endif
						<br/>
					@endforeach
				</td>
			</tr>
			<tr>
				<td>Episodes</td>
				<td>
					<?php
						$season = -10;
					?>
					@foreach($show->episodes()->get() as $episode)
						<?php
							if($season != $episode->c12)
							{
								$season = $episode->c12;
								echo $season == 0 ? 'Specials<br/>' : 'Season ' . $season . '</br>';
							}
						?>
						<a href="/episode/{{$episode->idEpisode}}">{{$episode->c13}} {{$episode->c00}}</a></br>
					@endforeach
				</td>
			</tr>
		</table>
	</div>

	@if($show->banner() || $show->fanart() || $show->poster())
		<div class="small-4 columns">
			<ul class="clearing-thumbs" data-clearing>
				@if($show->banner())
					<li><a class="th" href="{{$show->banner()}}"><img width="200px" data-caption="Banner" src="{{$show->banner()}}"></a></li>
				@endif
				@if($show->fanart())
					<li><a class="th" href="{{$show->fanart()}}"><img width="200px" data-caption="Fanart" src="{{$show->fanart()}}"></a></li>
				@endif
				@if($show->poster())
					<li><a class="th" href="{{$show->poster()}}"><img width="200px" data-caption="Poster" src="{{$show->poster()}}"></a></li>
				@endif
			</ul>
		</div>
	@endif
</div>