<?php

class Song extends Eloquent {

	protected $connection = 'music';
	protected $table = 'song';
	protected $primaryKey = 'idSong';

}
