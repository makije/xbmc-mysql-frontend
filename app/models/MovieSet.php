<?php

class MovieSet extends Eloquent {

	protected $connection = 'xbmc';
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

}