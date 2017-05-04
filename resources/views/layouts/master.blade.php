<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" >

    <title>Josh is Reddit</title>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/posts.css">
   
</head>
<body> 
	<main class="container img-responsive">

		@include('partials.header')

		@if (Session::has('successMessage'))
			<div class="alert alert-success">{{ session('successMessage') }}</div>
		@endif
		@if (Session::has('errorMessage'))
			<div class="alert alert-danger">{{ session('errorMessage') }}</div>
		@endif
		
		@yield('header')

	    @yield('content')

	    @yield('footer')

	</main>
<script src="https://use.fontawesome.com/11431c1d75.js"></script>
<script   src="https://code.jquery.com/jquery-3.2.1.min.js"   integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous"></script>
<script rel="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
@yield('scripts')
</body>
</html>