<?php

class Actor extends Eloquent {

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

	public function movies()
	{
		return $this->belongsToMany('Movie', 'actorlinkmovie', 'idActor', 'idMovie')->orderBy('c16');
	}

	public function tvshows()
	{
		return $this->belongsToMany('TVShow', 'actorlinktvshow', 'idActor', 'idShow')->orderBy('c00');
	}

}
