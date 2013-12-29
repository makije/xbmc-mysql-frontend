@if($movie->getPosters())
	<?php
		$number = 0;
	?>
	<div style="width: 500px;">
		<ul class="example-orbit" data-orbit data-options="timer_speed: 3000; pause_on_hover: false;">
			@foreach($movie->getPosters() as $poster)
				<li>
					<img src="{{$poster}}" alt="slide 1" />
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
<table>
	<tr>
		<td>Name</td>
		<td><a href="http://www.imdb.com/title/{{$movie->c09}}" target="_blank">{{ $movie->getName() }}</a></td>
	</tr>
	<tr>
		<td>Plot</td>
		<td>{{ $movie->c01 }}</td>
	</tr>
	<tr>
		<td>Country</td>
		<td>{{ $movie->c21 }}</td>
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
	<tr>
		<td>Download</td>
		<td><a href="/movie/{{$movie->idMovie}}/download">{{ $movie->getDownloadPath() }}</a></td>
	</tr>
</table>
