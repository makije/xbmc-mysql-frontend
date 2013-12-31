{{ Form::open(array('action' => 'WishController@store')) }}
	<div class="row">
		<div class="large-6 large-offset-3 small-12 columns">
			<div class="row collapse">
				<div class="small-5 large-3 columns">
					<span class="prefix">Title</span>
				</div>
				<div class="small-7 large-9 columns">
					{{ Form::text('title', Input::get('title'), array('placeholder' => 'Enter title name')) }}
				</div>
				<div class="small-5 large-3 columns">
					<span class="prefix">Type</span>
				</div>
				<div class="small-7 large-9 columns">
					{{ Form::select('type', array('movie' => 'Movie', 'tvshow' => 'TV Show', 'album' => 'Album', 'song' => 'Song'), 'movie') }}
				</div>
				<div class="small-5 large-3 columns">
					<span class="prefix">URL</span>
				</div>
				<div class="small-7 large-9 columns">
					{{ Form::text('url', Input::get('url'), array('placeholder' => 'Enter a url for the title')) }}
				</div>
			</div>

			<div class="row">
				<div class="large-3 large-offset-9 small-4 small-offset-8 columns">
					{{ Form::submit('Make a wish', array('class' => 'small button success')) }}
				</div>
			</div>

		</div>
	</div>
{{ Form::close() }}
