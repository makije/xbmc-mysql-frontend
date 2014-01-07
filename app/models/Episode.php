<?php

class Episode extends Eloquent {

	protected $connection = 'video';
	protected $table = 'episode';
	protected $primaryKey = 'idEpisode';

	public function getName()
	{
		return $this->c00;
	}

	public function getPreview() {

		if(strlen($this->c06) == 0)
			return null;

		$dom = new DOMDocument();
		@$dom->loadHTML($this->c06);

		$previews = array();

		foreach($dom->getElementsByTagName('thumb') as $thumb)
		{
			array_push($previews, $thumb->nodeValue);
		}

                return $previews[0];
        }

	public function getDownloadPath() {
		return str_replace(Config::get('app.srcPath'), Config::get('app.dstPath'), $this->c18);
	}

	public function file()
	{
		return $this->hasOne('VideoFile', 'idFile', 'idFile');
	}

	public function tvshow()
	{
		return $this->belongsTo('TVShow', 'idShow', 'idShow');
	}

	public function actors()
	{
		return $this->belongsToMany('Person', 'actorlinkepisode', 'idEpisode', 'idActor')->withPivot('strRole' ,'iOrder')->orderBy('pivot_iOrder');;
	}

	public function directors()
	{
		return $this->belongsToMany('Person', 'directorlinkepisode', 'idEpisode', 'idDirector')->orderBy('strActor');
	}

}
