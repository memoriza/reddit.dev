<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reddit</title>
</head>
<body>
	<li>
		<ul><a href="{{ action('HomeController@showWelcome') }}">home</a></ul>
		<ul><a href="{{ action('HomeController@increment">increment</a></ul>
		<ul><a href="{{ action('HomeController@uppercase">uppercase</a></ul>
	</li>
	@yield('header')

    @yield('content')

    @yield('footer')
</body>
</html>