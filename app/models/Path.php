<?php

class Path extends Eloquent {

	protected $connection = 'music';
	protected $table = 'path';
	protected $primaryKey = 'idPath';

	public function getPath()
	{
		return str_replace(Config::get('app.srcPath'), Config::get('app.dstPath'), $this->strPath);
	}

}
