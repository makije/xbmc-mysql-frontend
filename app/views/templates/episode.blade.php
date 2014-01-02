@if($episode->getPreview())
	<img src="{{$episode->getPreview()}}"/>
	<br/><br/>
@endif
<table>
	<tr>
		<td>Name</td>
		<td>{{ $episode->getName() }}</td>
	<tr>
		<td>Plot</td>
		<td>{{ $episode->c01 }}</td>
	</tr>
	<tr>
		<td>Path</td>
		<td>
			@if(Config::get('app.downloads'))
				<a href="/episode/{{$episode->idEpisode}}/download">
			@endif

			{{ $episode->getDownloadPath() }}

			@if(Config::get('app.downloads'))
				</a>
			@endif
		</td>
	</tr>
</table>
