<div class="row">
	<?php $i = 1; ?>
	@foreach($artists as $artist)
		<?php
			$previews = $artist->getPreviews();
		?>
		<div class="medium-3 columns @if((count($artists) == $i) && (count($artists) % 4 != 0)) end @endif">
			@if($previews[0] != '')
				<div class="list-image"><a href="/artist/{{$artist->idArtist}}"><img src="{{$previews[0]}}"/></a></div>
			@endif
			<p class="list-title"><a href="/artist/{{$artist->idArtist}}">{{ $artist->strArtist }}</a></p>
		</div>

		@if($i++ % 4 == 0)
			</div><div class="row">
		@endif
	@endforeach
</div>

@if($paginate)
	{{ $artists->links() }}
@endif