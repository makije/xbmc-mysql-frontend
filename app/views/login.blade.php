@extends('layouts.menu')

@section('content')

	{{ Form::open(array('login')) }}

		<div class="row">
			<div class="large-6 large-offset-3 small-12 columns">
				<div class="row collapse">
					<div class="small-5 large-3 columns">
						<span class="prefix">Username</span>
					</div>
					<div class="small-7 large-9 columns">
						{{ Form::text('username', '', array('placeholder' => 'Enter username', 'id' => 'username')) }}
					</div>
				</div>
				<div class="row collapse">
					<div class="small-5 large-3 columns">
						<span class="prefix">Password</span>
					</div>
					<div class="small-7 large-9 columns">
						{{ Form::password('password', array('placeholder' => 'Enter password')) }}
					</div>
				</div>
				<div class="row">
					<div class="large-3 large-offset-9 small-2 small-offset-10 columns">
						{{ Form::submit('Login', array('class' => 'small button success')) }}
					</div>
				</div>
				<div class="row">
					<div class="large-4 large-offset-8 small-2 small-offset-10 columns">
						{{ Form::checkbox('remember-me'); }} Remember me
					</div>
				</div>
			</div>
		</div>

	{{ Form::close() }}

@stop

@section('scripts')
	<script>$(document).ready(function(){ $('#username').focus(); });</script>
@stop
