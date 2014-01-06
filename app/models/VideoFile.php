<?php

class VideoFile extends Eloquent {

	protected $connection = 'video';
	protected $table = 'files';
	protected $primaryKey = 'idFile';

}
