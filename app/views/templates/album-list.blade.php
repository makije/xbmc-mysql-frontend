<div class="row">
	<?php $i = 1; ?>
	@foreach($albums as $album)
		<?php
			$previews = $album->getPreviews();
		?>
		<div class="medium-3 columns @if((count($albums) == $i) && (count($albums) % 4 != 0)) end @endif">
			@if($previews[0] != '')
				<div class="list-image"><a href="/album/{{$album->idAlbum}}"><img src="{{$previews[0]}}"/></a></div>
			@endif
			<p class="list-title">
				<?php $artist = $album->artists->first(); ?>
				
				<a href="/artist/{{$artist->idArtist}}">{{ $artist->strArtist }}</a><br>
				@if($album->strAlbum)
					<a href="/album/{{$album->idAlbum}}">{{ $album->strAlbum }}</a>
				@else
					<a href="/album/{{$album->idAlbum}}">{{ $album->artists->first()->strArtist }}</a>
				@endif
				</a>
			</p>
		</div>

		@if($i++ % 4 == 0)
			</div><div class="row">
		@endif
	@endforeach
</div>

@if($paginate)
	{{ $albums->links() }}
@endif
