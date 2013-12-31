@if($show->getBanners())
	<?php
		$number = 0;
	?>
	<div style="width: 758px;">
	<ul class="example-orbit" data-orbit data-options="timer_speed: 3000; pause_on_hover: false;">
		@foreach($show->getBanners() as $banner)
			<li>
				<img src="{{$banner}}" alt="slide 1" />
			</li>

			<?php
				$number++;

				if($number >= 10)
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
		<td>Network</td>
		<td>{{ $show->c14 }}</td>
	</tr>
	<tr>
		<td>Genre(s)</td>
		<td>{{ $show->c08 }}</td>
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
						echo 'Season ' . $season . '</br>';
					}
				?>
				<a href="/episode/{{$episode->idEpisode}}">{{$episode->c13}} {{$episode->c00}}</a></br>
			@endforeach
		</td>
	</tr>
</table>
