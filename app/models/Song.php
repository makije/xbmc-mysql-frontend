<?php

class Song extends Eloquent {

	protected $connection = 'music';
	protected $table = 'song';
	protected $primaryKey = 'idSong';

	public function path()
	{
		return $this->hasOne('Path', 'idPath', 'idPath');
	}

	public function artist()
	{
		return $this->belongsToMany('Artist', 'song_artist', 'idSong', 'idArtist');
	}

	public function album()
	{
		return $this->hasOne('Album', 'idAlbum', 'idAlbum');
	}

}
