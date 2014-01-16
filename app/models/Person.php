<?php

class Person extends Eloquent {

	protected $connection = 'video';
	protected $table = 'actors';
	protected $primaryKey = 'idActor';

	public function getName() {
		return $this->strActor;
	}

	public function getThumb()
	{
		return $this->beLongsTo('Art', 'idActor', 'media_id')->actor()->thumb();
	}

	public function thumb()
	{
		if($this->getThumb()->count() > 0)
			return $this->getThumb()->first()->url;
		else
			return null;
	}

	public function moviesActed()
	{
		return $this->belongsToMany('Movie', 'actorlinkmovie', 'idActor', 'idMovie')->withPivot('strRole')->orderBy('c07');
	}

	public function tvshowsActed()
	{
		return $this->belongsToMany('TVShow', 'actorlinktvshow', 'idActor', 'idShow')->withPivot('strRole')->orderBy('c05');
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
