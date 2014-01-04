@extends('layouts.menu')

@section('content')

	@if(Session::get('error')  && strlen(Session::get('message')) > 0)
		<center>
			<div data-alert class="alert-box alert large-6 small-12">
				<span>{{Session::get('message');}}</span>
				<a href="#" class="close">&times;</a>
			</div>
		</center>
        @endif

	@if(!Session::get('error') && strlen(Session::get('message')) > 0)
		<center>
			<div data-alert class="alert-box success large-6 small-12">
				<span>{{Session::get('message')}}</span>
				<a href="#" class="close">&times;</a>
			</div>
		</center>
        @endif

	{{ Form::open(array('profile')) }}
                <div class="row">
                        <div class="large-6 large-offset-3 small-12 columns">
                                <div class="row collapse">
                                        <div class="small-5 large-3 columns">
                                                <span class="prefix">Current password</span>
                                        </div>
                                        <div class="small-7 large-9 columns">
                                                {{ Form::password('password', array('placeholder' => 'Enter password')) }}
                                        </div>
                                </div>

                                <div class="row collapse">
                                        <div class="small-5 large-3 columns">
                                                <span class="prefix">New password</span>
                                        </div>
                                        <div class="small-7 large-9 columns">
                                                {{ Form::password('new-password', array('placeholder' => 'Please enter your new password')) }}
                                        </div>
                                </div>

                                <div class="row collapse">
                                        <div class="small-5 large-3 columns">
                                                <span class="prefix">Confirm</span>
                                        </div>
                                        <div class="small-7 large-9 columns">
                                                {{ Form::password('confirm', array('placeholder' => 'Please confirm your new password')) }}
                                        </div>
                                </div>

                                <div class="row collapse">
                                        <div class="small-5 large-3 columns">
                                                <span class="prefix">Items per page</span>
                                        </div>
                                        <div class="small-7 large-9 columns">
                                                {{ Form::selectRange('items_per_page', 10, 50, $user->items_per_page) }}
                                        </div>
                                </div>

                                <div class="row">
                                        <div class="large-3 large-offset-9 small-4 small-offset-8 columns">
                                                {{ Form::submit('Change', array('class' => 'small button success')) }}
                                        </div>
                                </div>

                        </div>
                </div>
        {{ Form::close() }}

	<h1>My wishes</h1>

	<table>
		<tr>
			<th>Title</th><th>Type</th><th>Granted</th><th>Edit</th>
		</tr>
		@foreach($user->wishes()->orderBy('title')->get() as $wish)
			<tr>
				<td><a href="/wish/{{$wish->id}}">{{$wish->title}}</a></td>
				<td>{{ucwords($wish->type)}}</td>
				<td>
					@if($wish->granted_url)
						<a href="{{$wish->granted_url}}">Here</a>
					@endif
				</td>
				<td><a href="/wish/{{$wish->id}}/edit">Edit</a></td>
			</tr>
		@endforeach
	</table>
@stop
