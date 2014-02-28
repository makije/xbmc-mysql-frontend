<div class="row">
	<?php $i = 1; ?>
	@foreach($shows as $show)
		<div class="medium-3 columns @if((count($shows) == $i) && (count($shows) % 4 != 0)) end @endif">
			<div class="list-image"><a href="/tvshow/{{$show->idShow}}" ><img src="{{ $show->poster() }}"/></a></div>
			<p class="list-title"><a href="/tvshow/{{$show->idShow}}" >{{ $show->getName() }}</a> @if(isset($as)) as {{ $show->pivot->strRole }} @endif</p>
		</div>

		@if($i++ % 4 == 0)
			</div><div class="row">
		@endif
	@endforeach
</div>

@if($paginate)
	{{ $shows->links() }}
@endif