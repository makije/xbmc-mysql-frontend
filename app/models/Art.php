<?php

class Art extends Eloquent {

	protected $connection = 'video';
	protected $table = 'art';
	protected $primaryKey = 'art_id';

	public function scopeMovie($query)
	{
		return $query->where('media_type', '=', 'movie');
	}

	public function scopePoster($query)
	{
		return $query->where('type', '=', 'poster');
	}

	public function scopeFanart($query)
	{
		return $query->where('type', '=', 'fanart');
	}

	public function scopeThumb($query)
	{
		return $query->where('type', '=', 'thumb');
	}
}
