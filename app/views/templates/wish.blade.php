<table>
	<tr>
		<td>Title</td>
		<td>{{ $wish->title }}</td>
	</tr>
	<tr>
		<td>Type</td>
		<td>{{ ucwords($wish->type) }}</td>
	</tr>
	@if($wish->url)
		<tr>
			<td>URL</td>
			<td><a href="{{ $wish->url }}" target="_blank">Go</a></td>
		</tr>
	@endif
	@if($wish->granted_url)
		<tr>
			<td>Granted</td>
			<td><a href="{{ $wish->granted_url }}">Here</a></td>
		</tr>
	@endif
</table>
