<?php

class TVShow extends Eloquent {

	protected $connection = 'video';
	protected $table = 'tvshow';
	protected $primaryKey = 'idShow';

	public function getBanners() {

		if(strlen($this->c06) == 0)
			return null;

		$dom = new DOMDocument();
		@$dom->loadHTML($this->c06);

		$banners = array();

		foreach($dom->getElementsByTagName('thumb') as $thumb)
		{
			if($thumb->getAttribute('aspect') == 'banner')
				array_push($banners, $thumb->nodeValue);
		}

		return $banners;
	}

	public function getName() {
		return $this->c00;
	}

	public function episodes()
	{
		return $this->hasMany('Episode', 'idShow', 'idShow');
	}

	public function getTTVDBID()
	{

		if(strlen($this->c10) == 0)
			return null;

		$dom = new DOMDocument();
		@$dom->loadHTML($this->c10);

		$id = null;

		foreach($dom->getElementsByTagName('url') as $url)
		{
			$id = str_replace('.xml', '', $url->getAttribute('cache'));
		}

		return $id;
	}
}
