@extends('layouts.menu')

@section('content')

	{{ Form::open(array('url' => 'tvshow/search', 'method' => 'get')) }}
                <div class="row">
                        <div class="large-6 large-offset-3 small-12 columns">
                                <div class="row collapse">
                                        <div class="small-5 large-3 columns">
                                                <span class="prefix">TV Show</span>
                                        </div>
                                        <div class="small-7 large-9 columns">
                                                {{ Form::text('tvshow', Input::get('tvshow'), array('placeholder' => 'Enter TV Show name', 'id' => 'tvshow')) }}
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

	@if(isset($tvshows))

		@include('templates.tvshow-list', array('shows' => $tvshows, 'paginate' => false))

	@endif

@stop

@section('scripts')
	<script>$(document).ready(function(){ $('#tvshow').focus(); });</script>
@stop
