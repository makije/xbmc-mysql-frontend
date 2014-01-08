<?php

class Studio extends Eloquent {

	protected $connection = 'video';
	protected $table = 'studio';
	protected $primaryKey = 'idStudio';

	public function getName()
	{
		return $this->strStudio;
	}
}
