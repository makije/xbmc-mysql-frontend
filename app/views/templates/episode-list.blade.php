<div class="row">
	<?php $i = 1; ?>
	@foreach($episodes as $episode)
		<div class="medium-3 columns @if((count($episodes) == $i) && (count($episodes) % 4 != 0)) end @endif">
			<div class="list-image"><a href="/episode/{{$episode->idEpisode}}" ><img src="{{ $episode->getPreview() }}"/></a></div>
			<p class="list-title">
				<a href="/tvshow/{{$episode->tvshow->idShow}}">{{$episode->tvshow->getName()}}</a><br>
				<a href="/episode/{{$episode->idEpisode}}" >{{ $episode->getName() }}</a>
			</p>
		</div>

		@if($i++ % 4 == 0)
			</div><div class="row">
		@endif
	@endforeach
</div>

@if($paginate)
	{{ $shows->links() }}
@endif