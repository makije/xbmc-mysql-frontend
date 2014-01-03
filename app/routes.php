<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::filter('auth', function()
{
	if(!Request::secure())
		return Redirect::secure(Request::getRequestUri());

	if(!Auth::check())
		return Redirect::to('login');
});

Route::filter('secure', function()
{
	if( !Request::secure())
		return Redirect::secure(Request::getRequestUri());
});

Route::get('login', array('before' => 'secure', function()
{
	return View::make('login');
}));

Route::post('login', array('before' => 'secure', function() {
	$userdata = array(
		'username' => Input::get('username'),
		'password' => Input::get('password')
	);

	if ( Auth::attempt($userdata) )
		return Redirect::to('/');
	else
		return Redirect::to('login')->with('login_errors', true);
}));

Route::get('logout', array('before' => 'auth', function() {
	Auth::logout();
	return Redirect::to("/");
}));

Route::get('profile', array('before' => 'auth', function()
{
	return View::make('profile')->with('user', Auth::user());
}));

Route::post('profile', array('before' => 'auth', function()
{
	$message = '';
	$error = false;

	if(Auth::user()->items_per_page != Input::get('items_per_page'))
	{
		Auth::user()->items_per_page = Input::get('items_per_page');
		Auth::user()->save();
		$message .= 'Items per page updated<br/>';
	}

	if(Hash::check(Input::get('password'), Auth::user()->password) && strlen(Input::get('new-password')) > 0 && Input::get('new-password') == Input::get('confirm')) {
		Auth::user()->password = Hash::make(Input::get('new-password'));
		Auth::user()->save();
		$message .= 'Password updated<br/>';
	}

	if(!Hash::check(Input::get('password'), Auth::user()->password) && strlen(Input::get('password')) > 0)
	{
		$error = true;
		$message .= 'Password incorrect<br/>';
	}

	if(Input::get('new-password') != Input::get('confirm'))
	{
		$error = true;
		$message .= 'Password does not match<br/>';
	}

	return Redirect::to('profile')->with(array('message' => $message, 'error' => $error));

}));

Route::get('/', array('before' => 'auth', function()
{
	return View::make('index');
}));

Route::get('movie/latest', array('before' => 'auth', function()
{
	$movies = Movie::where('idMovie', '>', 0)->orderBy('idMovie', 'desc')->take(Auth::user()->items_per_page)->get();
	return View::make('movie-latest')->with('movies', $movies);
}));

Route::get('movie/search', array('before' => 'auth', function()
{
	if(Input::has('movie') && strlen(Input::get('movie')) > 0) {
		$movieName = Input::get('movie');
		$movies = Movie::where('c16', 'like', '%' . str_replace(' ', '%', $movieName) . '%')->orderBy('c16', 'asc')->get();
		return View::make('movie-search')->with('movies', $movies);
	}
	else
		return View::make('movie-search');
}));

Route::resource('movie', 'MovieController');
Route::get('movie/{id}/download', 'MovieController@download');
Route::get('movie/{id}/info', 'MovieController@info');

Route::resource('movieset', 'MovieSetController');

Route::get('tvshow/search', array('before' => 'auth', function()
{
	if(Input::has('tvshow') && strlen(Input::get('tvshow')) > 0) {
		$tvshowName = Input::get('tvshow');
		$shows = TVShow::where('c00', 'like', '%' . str_replace(' ', '%', $tvshowName) . '%')->orderBy('c00', 'asc')->get();
		return View::make('tvshow-search')->with('tvshows', $shows);
	}
	else
		return View::make('tvshow-search');
}));

Route::resource('tvshow', 'TVShowController');

Route::get('episode/latest', array('before' => 'auth', function()
{
	$episodes = Episode::with('tvshow')->orderBy('idEpisode', 'desc')->take(Auth::user()->items_per_page)->get();
	return View::make('episode-latest')->with('episodes', $episodes);
}));

Route::get('episode/{id}', array('before' => 'auth', function($id)
{
	$episode = Episode::find($id);
	return View::make('episode')->with('episode', $episode);
}));

Route::get('episode/{id}/download', array('before' => 'auth', function($id)
{
	if(Config::get('app.downloads'))
	{
		$episode = Episode::find($id);
		return Response::download($episode->getDownloadPath());
	}
	else
	{
		App:abort(404);
	}
}));

Route::get('music/search', array('before' => 'auth', function()
{
	if(Input::has('name') && strlen(Input::get('name')) > 0 && Input::has('artist') && !Input::has('album')) {
		$name = Input::get('name');
		$artists = Artist::where('strArtist', 'like', '%' . str_replace(' ', '%', $name) . '%')->orderBy('strArtist', 'asc')->get();
		return View::make('music-search')->with('artists', $artists);
	}
	else if(Input::has('name') && strlen(Input::get('name')) > 0 && Input::has('album') && !Input::has('artist')) {
		$name = Input::get('name');
		$albums = Album::where('strAlbum', 'like', '%' . str_replace(' ', '%', $name) . '%')->orderBy('strAlbum', 'asc')->get();
		return View::make('music-search')->with('albums', $albums);
        }
	else if(Input::has('name') && strlen(Input::get('name')) > 0 && Input::has('artist') && Input::has('artist')) {
		$name = Input::get('name');
		$artists = Artist::where('strArtist', 'like', '%' . str_replace(' ', '%', $name) . '%')->orderBy('strArtist', 'asc')->get();
		$albums = Album::where('strAlbum', 'like', '%' . str_replace(' ', '%', $name) . '%')->orderBy('strAlbum', 'asc')->get();
		return View::make('music-search')->with(array('albums' => $albums, 'artists' => $artists));
	}
	else
		return View::make('music-search');
}));

Route::resource('artist', 'ArtistController');
Route::resource('album', 'AlbumController');

Route::get('wish/granted', 'WishController@granted');
Route::resource('wish', 'WishController');

Route::get('actor/search', array('before' => 'auth', function()
{
	if(Input::has('actor') && strlen(Input::get('actor')) > 0) {
		$actorName = Input::get('actor');
		$actors = Actor::where('strActor', 'like', '%' . str_replace(' ', '%', $actorName) . '%')->orderBy('strActor', 'asc')->get();
		return View::make('actor-search')->with('actors', $actors);
	}
	else
		return View::make('actor-search');
}));

Route::resource('actor', 'ActorController');

if (Config::get('database.log', false))
{
	Event::listen('illuminate.query', function($query, $bindings, $time, $name)
	{
	$data = compact('bindings', 'time', 'name');

	// Format binding data for sql insertion
	foreach ($bindings as $i => $binding)
	{
		if ($binding instanceof \DateTime)
		{
			$bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
		}
		else if (is_string($binding))
		{
			$bindings[$i] = "'$binding'";
		}
	}

	// Insert bindings into query
	$query = str_replace(array('%', '?'), array('%%', '%s'), $query);
	$query = vsprintf($query, $bindings);

	Log::info($query, $data);
	});
}
