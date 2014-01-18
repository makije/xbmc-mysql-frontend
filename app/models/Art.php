<?php

class Art extends Eloquent {

	protected $connection = 'video';
	protected $table = 'art';
	protected $primaryKey = 'art_id';

	public function scopeMovie($query)
	{
		return $query->where('media_type', '=', 'movie');
	}

	public function scopeTvshow($query)
	{
		return $query->where('media_type', '=', 'tvshow');
	}

	public function scopeSet($query)
	{
		return $query->where('media_type', '=', 'set');
	}

	public function scopeActor($query)
	{
		return $query->where('media_type', '=', 'actor');
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

	public function scopeBanner($query)
	{
		return $query->where('type', '=', 'banner');
	}

	public function scopeClearlogo($query)
	{
		return $query->where('type', '=', 'clearlogo');
	}

}
