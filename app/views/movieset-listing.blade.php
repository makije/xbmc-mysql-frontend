@extends('layouts.menu')

@section('content')

		<table>
			<thead>
				<tr>
					<th>Name</th><th>Number of movies</th>
				</tr>
			</thead>

			@foreach($movieSets as $set)
				<tr>
					<td><a href="/movieset/{{$set->idSet}}" >{{ $set->getName() }}</a></td>
					<td>{{$set->movies->count()}}</td>
				</tr>
			@endforeach

		</table>

		{{ $movieSets->links() }}

@stop
