<?php

class StreamDetail extends Eloquent {

	protected $connection = 'video';
	protected $table = 'streamdetails';
	protected $primaryKey = 'idFile';

	public function scopeVideo($query)
	{
		return $query->where('iStreamType', '=', 0);
	}

	public function scopeAudio($query)
	{
		return $query->where('iStreamType', '=', 1)->orderBy('strAudioLanguage');
	}

	public function scopeSubtitle($query)
	{
		return $query->where('iStreamType', '=', 2)->orderBy('strSubtitleLanguage');
	}
}
