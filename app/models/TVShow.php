<?php

class TVShow extends Eloquent {

	protected $connection = 'video';
	protected $table = 'tvshow';
	protected $primaryKey = 'idShow';

	public function getName() {
		return $this->c00;
	}

	public function episodes()
	{
		return $this->hasMany('Episode', 'idShow', 'idShow');
	}

	public function getTTVDBID()
	{

		if(strlen($this->c10) == 0)
			return null;

		$dom = new DOMDocument();
		@$dom->loadHTML($this->c10);

		$id = null;

		foreach($dom->getElementsByTagName('url') as $url)
		{
			$id = str_replace('.xml', '', $url->getAttribute('cache'));
		}

		return $id;
	}

	public function actors()
	{
		return $this->belongsToMany('Person', 'actorlinktvshow', 'idShow', 'idActor')->withPivot('strRole', 'iOrder')->orderBy('pivot_iOrder');
	}

	public function studio()
	{
		return $this->belongsToMany('Studio', 'studiolinktvshow', 'idShow', 'idStudio');
	}

	public function genres()
	{
		return $this->belongsToMany('Genre', 'genrelinktvshow', 'idShow', 'idGenre')->orderBy('strGenre');
	}

	public function getBanner()
	{
		return $this->beLongsTo('Art', 'idShow', 'media_id')->tvshow()->banner();
	}

	public function banner()
	{
		$banner = $this->getBanner();
		if($banner->count() > 0)
			return $banner->first()->url;
		else
			return null;
	}

	public function getFanart()
	{
		return $this->beLongsTo('Art', 'idShow', 'media_id')->tvshow()->fanart();
	}

	public function fanart()
	{
		$fanart = $this->getFanart();
		if($fanart->count() > 0)
			return $fanart->first()->url;
		else
			return null;
	}

	public function getPoster()
	{
		return $this->beLongsTo('Art', 'idShow', 'media_id')->tvshow()->poster();
	}

	public function poster()
	{
		$poster = $this->getPoster();
		if($poster->count() > 0)
			return $poster->first()->url;
		else
			return null;
	}
}
