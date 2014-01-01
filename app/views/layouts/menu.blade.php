@extends('layouts.master')

@section('menu')
	<nav class="top-bar" data-topbar>
                <ul class="title-area">
                        <li class="name">
                                <h1><a href="/">{{Config::get('app.name');}}</a></h1>
                        </li>
                </ul>

		<section class="top-bar-section">
			<ul class="right">
				@if(Auth::check())

					<li class="has-dropdown">
						<a href="#">{{ Auth::user()->username }}</a>
						<ul class="dropdown">
							<li><a href="/profile">Profile</a></li>
						</ul>
					</li>

					<li class="has-form">
						<a href={{ URL::to('logout') }} class="button alert">Logout</a>
					</li>

				@else
					<li class="has-form">
                                                <a href={{ URL::to('login') }} class="button success">Login</a>
                                        </li>
				@endif

			</ul>

			@if(Auth::check())
				<ul class="left">
					<li class="has-dropdown">
                                                <a href="{{URL::to('actor')}}">Actors</a>
                                                <ul class="dropdown">
                                                        <li><a href="{{URL::to('actor')}}">List</a></li>
                                                </ul>
                                        </li>
					<li class="has-dropdown">
                                                <a href="{{URL::to('movie')}}">Movies</a>
                                                <ul class="dropdown">
                                                        <li><a href="{{URL::to('movie/latest')}}">Latest</a></li>
                                                        <li><a href="{{URL::to('movie')}}">List</a></li>
                                                        <li><a href="{{URL::to('movie/search')}}">Search</a></li>
                                                        <li><a href="{{URL::to('movieset')}}">Sets</a></li>
                                                </ul>
                                        </li>
					<li class="has-dropdown">
						<a href="{{URL::to('tvshow')}}">TV Shows</a>
						<ul class="dropdown">
							<li><a href="{{URL::to('episode/latest')}}">Latest</a></li>
							<li><a href="{{URL::to('tvshow')}}">List</a></li>
							<li><a href="{{URL::to('tvshow/search')}}">Search</a></li>
						</ul>
					</li>
					<li class="has-dropdown">
						<a href="{{URL::to('artist')}}">Music</a>
						<ul class="dropdown">
							<li><a href="{{URL::to('artist')}}">Artists</a></li>
							<li><a href="{{URL::to('album')}}">Albums</a></li>
						</ul>
					</li>
					<li class="has-dropdown">
						<a href="{{URL::to('wish')}}">Wishes</a>
						<ul class="dropdown">
							<li><a href="{{URL::to('wish/granted')}}">Granted wishes</a></li>
							<li><a href="{{URL::to('wish/create')}}">Make a wish</a></li>
							<li><a href="{{URL::to('wish')}}">Wishes</a></li>
						</ul>
					</li>
				</ul>
			@endif
		</section>
	</nav>
@stop
