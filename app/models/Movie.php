<?php

class Movie extends Eloquent {

	protected $connection = 'xbmc';
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
		if(strcmp($this->c00, $this->c16) == 0)
			return $this->c00 . ' (' . $this->c07 . ')';
		else
			return $this->c16 . ' (' . $this->c07 . ')<br/>(' . $this->c00 . ')';
	}

	public function set()
	{
		return $this->belongsTo('MovieSet', 'idSet', 'idSet');
	}

}