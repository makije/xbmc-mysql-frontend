<table>
	<thead>
		<tr>
			<th>Name</th>
		</tr>
	</thead>

	@foreach($countries as $country)
		<tr>
			<td><a href="/country/{{$country->idCountry}}" >{{ $country->getName() }}</a></td>
		</tr>
	@endforeach

</table>

@if($paginate)
	{{ $countries->links() }}
@endif
