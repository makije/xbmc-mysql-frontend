<?php

class MovieSet extends Eloquent {

	protected $connection = 'video';
	protected $table = 'sets';
	protected $primaryKey = 'idSet';

	public function getName()
	{
		return $this->strSet;
	}

	public function movies()
	{
		return $this->hasMany('Movie', 'idSet', 'idSet');
	}

	public function getPoster()
	{
		return $this->beLongsTo('Art', 'idSet', 'media_id')->set()->poster();
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
		return $this->beLongsTo('Art', 'idSet', 'media_id')->set()->fanart();
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
