<?php

class Studio extends Eloquent {

	protected $connection = 'video';
	protected $table = 'studio';
	protected $primaryKey = 'idStudio';

	public function getName()
	{
		return $this->strStudio;
	}

	public function movies()
	{
		return $this->belongsToMany('Movie', 'studiolinkmovie', 'idStudio', 'idMovie')->orderBy('c00');
	}

	public function tvshows()
	{
		return $this->belongsToMany('TVShow', 'studiolinktvshow', 'idStudio', 'idShow')->orderBy('c00');
	}
}
