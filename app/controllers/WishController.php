<?php

class WishController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$wishes = Wish::whereRaw('id > ? and granted_url is null', array(0))->paginate();
		return View::make('wish-listing')->with('wishes', $wishes);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('add-wish');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$title = Input::get('title');
		$type = Input::get('type');
		$url = Input::get('url');

		$wish = new Wish;
		$wish->user_id = Auth::user()->id;
		$wish->title = $title;
		$wish->type = $type;
		$wish->url = $url;
		$wish->save();

		return Redirect::to('/wish/' . $wish->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$wish = Wish::find($id);
		return View::make('wish')->with('wish', $wish);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$wish = Wish::find($id);
		return View::make('add-wish', array('wish' => $wish, 'grant' => true));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$wish = Wish::find($id);
		$title = Input::get('title');
		$type = Input::get('type');
		$url = Input::get('url');
		$granturl = Input::get('granturl');

		$wish->title = $title;
		$wish->type = $type;
		$wish->url = $url;
		if(strlen($granturl) > 0)
			$wish->granted_url = $granturl;
		else
			$wish->granted_url = null;
		$wish->save();

		return Redirect::to('/wish/' . $wish->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function granted()
	{
		$wishes = Wish::whereRaw('id > ? and granted_url is not null', array(0))->paginate();
		return View::make('wish-listing')->with('wishes', $wishes);
	}

}
