<table>
	<thead>
		<tr>
			<th>Poster</th>
			<th>Name</th>
		</tr>
	</thead>

	@foreach($shows as $show)
		<tr>
			<?php
				$banners = $show->getBanners();
			?>
			<td><a href="/tvshow/{{$show->idShow}}" ><img width="300px" src="{{ $banners[0] }}"/></a></td>
			<td><a href="/tvshow/{{$show->idShow}}" >{{ $show->getName() }}</a></td>
		</tr>
	@endforeach

</table>

@if($paginate)
	{{ $shows->links() }}
@endif
