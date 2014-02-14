<!DOCTYPE html>
<html>
	<head>
		<title>{{Config::get('app.name')}}</title>
		{{HTML::style('assets/css/normalize.css')}}
		{{HTML::style('assets/css/foundation.css')}}
		{{HTML::script('assets/js/modernizr.js')}}
	</head>

	<body>

		<div class="menu">
			@yield('menu')
		</div>

		<div style="position: absolute; right: 3em; left: 3em; top: 4em; buttom: 3em;" align="center">
			@yield('content')
		</div>

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
