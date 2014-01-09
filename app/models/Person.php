<?php

class Person extends Eloquent {

	protected $connection = 'video';
	protected $table = 'actors';
	protected $primaryKey = 'idActor';

	public function getPicture() {

		if(strlen($this->strThumb) == 0)
			return null;

		$dom = new DOMDocument();
		@$dom->loadHTML($this->strThumb);

		$pictures = array();

		foreach($dom->getElementsByTagName('thumb') as $thumb)
		{
			array_push($pictures, $thumb->nodeValue);
		}

		return $pictures[0];
	}

	public function getName() {
		return $this->strActor;
	}

	public function moviesActed()
	{
		return $this->belongsToMany('Movie', 'actorlinkmovie', 'idActor', 'idMovie')->orderBy('c07');
	}

	public function tvshowsActed()
	{
		return $this->belongsToMany('TVShow', 'actorlinktvshow', 'idActor', 'idShow')->orderBy('c05');
	}

	public function moviesDirected()
	{
		return $this->belongsToMany('Movie', 'directorlinkmovie', 'idDirector', 'idMovie')->orderBy('c07');
	}

	public function episodesDirected()
	{
		return $this->belongsToMany('Episode', 'directorlinkepisode', 'idDirector', 'idEpisode')->orderBy('c05');
	}

	public function moviesWritten()
	{
		return $this->belongsToMany('Movie', 'writerlinkmovie', 'idWriter', 'idMovie')->orderBy('c07');
	}

	public function episodesWritten()
	{
		return $this->belongsToMany('Episode', 'writerlinkepisode', 'idWriter', 'idEpisode')->orderBy('c05');
	}
}
