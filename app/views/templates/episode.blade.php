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
		<td>Download</td>
		<td><a href="/episode/{{$episode->idEpisode}}/download">{{ $episode->getDownloadPath() }}</a></td>
	</tr>
</table>
