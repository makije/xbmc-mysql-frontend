@extends('layouts.menu')

@section('content')

	@if(Session::has('password_error'))
		<center>
			<div data-alert class="alert-box alert large-6 small-12">
				<span>Error</span>
				<a href="#" class="close">&times;</a>
			</div>
		</center>
        @endif

	@if(Session::has('changed'))
		<center>
			<div data-alert class="alert-box success large-6 small-12">
				<span>Password changed</span>
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

                                <div class="row">
                                        <div class="large-3 large-offset-9 small-4 small-offset-8 columns">
                                                {{ Form::submit('Change', array('class' => 'small button success')) }}
                                        </div>
                                </div>

                        </div>
                </div>
        {{ Form::close() }}

@stop
