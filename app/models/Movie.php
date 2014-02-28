<?php

class Movie extends Eloquent {

	protected $connection = 'video';
	protected $table = 'movie';
	protected $primaryKey = 'idMovie';

	public function getPosters() {

		if(strlen($this->c08) == 0)
			return null;

		$dom = new DOMDocument();
		@$dom->loadHTML($this->c08);

		$posters = array();

		foreach($dom->getElementsByTagName('thumb') as $thumb)
		{
			if($thumb->getAttribute('aspect') == 'poster')
				array_push($posters, $thumb->nodeValue);
		}

		return $posters;
	}

	public function getDownloadPath() {
		return str_replace(Config::get('app.srcPath'), Config::get('app.dstPath'), $this->c22);
	}

	public function getName() {
		return $this->c00;
	}

	public function getAlias()
	{
		return $this->c16;
	}

	public function hasAlias() {
		return $this->getName() != $this->getAlias();
	}

	public function getYear()
	{
		return $this->c07;
	}

	public function getRating()
	{
		return $this->c12;
	}

	public function streamDetails()
	{
		return $this->beLongsTo('StreamDetail', 'idFile', 'idFile')->orderBy('iStreamType');
	}

	public function video()
	{
		return $this->beLongsTo('StreamDetail', 'idFile', 'idFile')->video();
	}

	public function audio()
	{
		return $this->beLongsTo('StreamDetail', 'idFile', 'idFile')->audio();
	}

	public function subtitles()
	{
		return $this->beLongsTo('StreamDetail', 'idFile', 'idFile')->subtitle();
	}

	public function file()
	{
		return $this->hasOne('VideoFile', 'idFile', 'idFile');
	}

	public function set()
	{
		return $this->belongsTo('MovieSet', 'idSet', 'idSet');
	}

	public function actors()
	{
		return $this->belongsToMany('Person', 'actorlinkmovie', 'idMovie', 'idActor')->withPivot('strRole', 'iOrder')->orderBy('pivot_iOrder');
	}

	public function directors()
	{
		return $this->belongsToMany('Person', 'directorlinkmovie', 'idMovie', 'idDirector')->orderBy('strActor');
	}

	public function writers()
	{
		return $this->belongsToMany('Person', 'writerlinkmovie', 'idMovie', 'idWriter')->orderBy('strActor');
	}

	public function studio()
	{
		return $this->belongsToMany('Studio', 'studiolinkmovie', 'idMovie', 'idStudio');
	}

	public function genres()
	{
		return $this->belongsToMany('Genre', 'genrelinkmovie', 'idMovie', 'idGenre')->orderBy('strGenre');
	}

	public function country()
	{
		return $this->belongsToMany('Country', 'countrylinkmovie', 'idMovie', 'idCountry');
	}

	public function getPoster()
	{
		return $this->beLongsTo('Art', 'idMovie', 'media_id')->movie()->poster();
	}

	public function poster()
	{
		$poster = $this->getPoster();
		if($poster->count() > 0)
			return $poster->first()->url;
		else
			return null;
	}

	public function getFanart()
	{
		return $this->beLongsTo('Art', 'idMovie', 'media_id')->movie()->fanart();
	}

	public function fanart()
	{
		$fanart = $this->getFanart();
		if($fanart->count() > 0)
			return $fanart->first()->url;
		else
			return null;
	}
}
