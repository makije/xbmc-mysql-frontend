<div class="row">
	<?php $i = 1; ?>
	@foreach($persons as $person)
		<div class="medium-2 columns @if((count($persons) == $i) && (count($persons) % 6 != 0)) end @endif">
			<div class="list-image"><a href="/person/{{$person->idActor}}" ><img src="{{ $person->thumb() }}"/></a></div>
			<p class="list-title"><a href="/person/{{$person->idActor}}" >{{ $person->getName() }}</a></p>
		</div>

		@if($i++ % 6 == 0)
			</div><div class="row">
		@endif
	@endforeach
</div>

@if($paginate)
	{{ $persons->links() }}
@endif