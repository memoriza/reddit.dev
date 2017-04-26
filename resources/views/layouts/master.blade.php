<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reddit</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<main class="container">

		<ul>

			<li><a href="{{ action('HomeController@showWelcome') }}">Welcome</a></ul>
			<li><a href="{{ action('HomeController@uppercase') }}">UPPERCASE</a></li>
			<li><a href="{{ action('HomeController@rolldice') }}">Dice Roll</a></li>
			<li><a href="{{ action('HomeController@add') }}">Add</a></li>
			<li><a href="{{ action('HomeController@increment') }}">Increment</a></li>
		
		</ul>

		@yield('header')

	    @yield('content')

	    @yield('footer')
	</main>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>