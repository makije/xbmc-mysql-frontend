<?php

class Country extends Eloquent {

	protected $connection = 'video';
	protected $table = 'country';
	protected $primaryKey = 'idCountry';

	public function getName()
	{
		return $this->strCountry;
	}

	public function movies()
	{
		return $this->belongsToMany('Movie', 'countrylinkmovie', 'idCountry', 'idMovie')->orderBy('c00');
	}
}
