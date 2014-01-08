@if($show->getBanners())
	<?php
		$number = 0;
	?>
	<div style="width: 758px;">
	<ul class="example-orbit" data-orbit data-options="timer_speed: 3000; pause_on_hover: false;">
		@foreach($show->getBanners() as $banner)
			<li>
				<img src="{{$banner}}"/>
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
<br/><br/>
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
			<td>{{ $show->studio()->first()->getName() }}</td>
		</tr>
	@endif
	<tr>
		<td>Genre(s)</td>
		<td>{{ $show->c08 }}</td>
	</tr>
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
