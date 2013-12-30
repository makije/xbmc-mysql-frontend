<?php

class Artist extends Eloquent {

	protected $connection = 'music';
	protected $table = 'artistview';
	protected $primaryKey = 'idArtist';

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

	public function albums()
	{
		return $this->belongsToMany('Album', 'album_artist', 'idArtist', 'idAlbum');
	}
}
