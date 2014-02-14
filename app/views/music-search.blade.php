@extends('layouts.menu')

@section('content')

	{{ Form::open(array('url' => 'music/search', 'method' => 'get')) }}
		<div class="row">
                        <div class="large-6 large-offset-3 small-12 columns">
                                <div class="row collapse">
                                        <div class="small-5 large-3 columns">
                                                <span class="prefix">Name</span>
                                        </div>
                                        <div class="small-7 large-9 columns">
                                                {{ Form::text('name', Input::get('name'), array('placeholder' => 'Enter name', 'id' => 'name')) }}
                                        </div>
                                </div>

				<div class="row collapse">
					<div class="large-3 columns">
						<span class="prefix">Search for</span>
					</div>
					<div class="small-7 large-9 columns">
						{{ Form::checkbox('artist', null, Input::has('artist')) }}<label for="artist">Artist</label>
						{{ Form::checkbox('album', null, Input::has('album')) }}<label for="album">Album</label>
						{{ Form::checkbox('song', null, Input::has('song')) }}<label for="song">Song</label>
					</div>
				</div>

                                <div class="row">
                                        <div class="large-3 large-offset-9 small-4 small-offset-8 columns">
                                                {{ Form::submit('Search', array('class' => 'small button success')) }}
                                        </div>
                                </div>

                        </div>
                </div>
        {{ Form::close() }}

	@if(isset($artists))

		<h1>Artists</h1>

		@include('templates.artist-list', array('artists' => $artists, 'paginate' => false))

	@endif

	@if(isset($albums))

		<h1>Albums</h1>

		@include('templates.album-list', array('albums' => $albums, 'paginate' => false))

	@endif

	@if(isset($songs))

		<h1>Songs</h1>

		@include('templates.song-list', array('songs' => $songs, 'paginate' => false))

	@endif

@stop

@section('scripts')
	<script>$(document).ready(function(){ $('#name').focus(); });</script>
@stop
