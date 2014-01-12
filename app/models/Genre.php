<?php

class Genre extends Eloquent {

	protected $connection = 'video';
	protected $table = 'genre';
	protected $primaryKey = 'idGenre';

	public function getName()
	{
		return $this->strGenre;
	}

	public function movies()
	{
		return $this->belongsToMany('Movie', 'genrelinkmovie', 'idGenre', 'idMovie')->orderBy('c00');
	}

	public function tvshows()
	{
		return $this->belongsToMany('TVShow', 'genrelinktvshow', 'idGenre', 'idShow')->orderBy('c00');
	}
}
