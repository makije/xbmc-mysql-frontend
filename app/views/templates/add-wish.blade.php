@if(!isset($wish))
	{{ Form::open(array('action' => 'WishController@store')) }}
@else
	{{ Form::open(array('action' => array('WishController@update', $wish->id), 'method' => 'PUT')) }}
@endif
	<div class="row">
		<div class="large-6 large-offset-3 small-12 columns">
			<div class="row collapse">
				<div class="small-5 large-3 columns">
					<span class="prefix">Title</span>
				</div>
				<div class="small-7 large-9 columns">
					{{ Form::text('title', isset($wish) ? $wish->title : Input::get('title'), array('placeholder' => 'Enter title name')) }}
				</div>
				<div class="small-5 large-3 columns">
					<span class="prefix">Type</span>
				</div>
				<div class="small-7 large-9 columns">
					{{ Form::select('type', array('movie' => 'Movie', 'tvshow' => 'TV Show', 'album' => 'Album', 'song' => 'Song'), isset($wish) ? $wish->type : 'movie') }}
				</div>
				<div class="small-5 large-3 columns">
					<span class="prefix">URL</span>
				</div>
				<div class="small-7 large-9 columns">
					{{ Form::text('url', isset($wish) ? $wish->url : Input::get('url'), array('placeholder' => 'Enter a url for the title')) }}
				</div>
				@if(isset($grant))
					<div class="small-5 large-3 columns">
						<span class="prefix">Grant URL</span>
					</div>
					<div class="small-7 large-9 columns">
						{{ Form::text('granturl', isset($wish) ? $wish->granted_url : Input::get('granturl'), array('placeholder' => 'Enter a url for the granted wish')) }}
					</div>
				@endif
			</div>

			<div class="row">
				<div class="large-3 large-offset-9 small-4 small-offset-8 columns">
					{{ Form::submit(isset($wish) ? 'Save' : 'Make a wish', array('class' => 'small button success')) }}
				</div>
			</div>

		</div>
	</div>
{{ Form::close() }}
