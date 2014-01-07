<?php

class VideoFile extends Eloquent {

	protected $connection = 'video';
	protected $table = 'files';
	protected $primaryKey = 'idFile';

	public function getDates()
	{
		return array('lastPlayed', 'dateAdded');
	}

}
