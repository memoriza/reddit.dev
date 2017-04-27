<!DOCTYPE html>
<html lang="en">
<head>
    <title>Josh is Reddit</title>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/posts.css">
    <script rel="text/javascript" src="https://code.jquery.com/jquery-3.2.1.slim.min.js"   integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>
</head>
<body>
	<main class="container">

		@if (Session::has('successMessage'))
			<div class"alert alert-success">{{ session('successMessage') }}</div>
		@endif
		@if (Session::has('errorMessage'))
			<div class="alert alert-danger">{{ session('errorMessage') }}</div>
		@endif
		<p class ="btn btn-outline-success"><a href="{{ action('HomeController@showWelcome') }}">Welcome</a></p>
		<p class ="btn btn-outline-success"><a href="{{ action('HomeController@uppercase') }}">UPPERCASE</a></p>
		<p class ="btn btn-outline-success"><a href="{{ action('HomeController@rolldice') }}">Dice Roll</a></p>
		<p class ="btn btn-outline-success"><a href="{{ action('HomeController@add') }}">Add</a></p>
		<p class ="btn btn-outline-success"><a href="{{ action('HomeController@increment') }}">Increment</a></p>
		<br>

		@yield('header')

	    @yield('content')

	    @yield('footer')

	</main>
<script rel="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>