<?php

class Album extends Eloquent {

	protected $connection = 'music';
	protected $table = 'albumview';
	protected $primaryKey = 'idAlbum';

	public function getPreviews() {

		if(strlen($this->strImage) == 0)
			return null;

		$dom = new DOMDocument();
		@$dom->loadHTML($this->strImage);

		$previews = array();

		foreach($dom->getElementsByTagName('thumb') as $thumb)
		{
			array_push($previews, $thumb->nodeValue . '/preview');
		}

		return $previews;
	}

	public function artists()
	{
		return $this->belongsToMany('Artist', 'album_artist', 'idAlbum', 'idArtist');
	}

	public function songs()
	{
		return $this->hasMany('Song', 'idAlbum', 'idAlbum')->orderBy('idPath', 'asc', 'iTrack', 'asc');
	}

}
