<!DOCTYPE html>
<html>
	<head>
		<title>{{Config::get('app.name')}}</title>
		{{HTML::style('assets/css/normalize.css')}}
		{{HTML::style('assets/css/foundation.css')}}
		{{HTML::style('assets/css/style.css')}}
		{{HTML::script('assets/js/modernizr.js')}}
	</head>

	<body>

		<div class="menu">
			@yield('menu')
		</div>

		<section class="content">
			<div class="row">
				<div class="small-12 columns">
					@yield('content')
				</div>
			</div>
		</section>

		{{HTML::script('assets/js/vendor/jquery.js')}}
		{{HTML::script('assets/js/foundation/foundation.js')}}
		{{HTML::script('assets/js/foundation/foundation.topbar.js')}}
		{{HTML::script('assets/js/foundation/foundation.alert.js')}}
		{{HTML::script('assets/js/foundation/foundation.reveal.js')}}
		{{HTML::script('assets/js/foundation/foundation.clearing.js')}}
		<script>
                        $(document).foundation();
                </script>

		@yield('scripts')

	</body>
</html>
