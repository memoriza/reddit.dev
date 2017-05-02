@section('header')


<nav class="navbar navbar-collapse">
   
  	<div class="nav navbar-nav">
  		<li>
			{!! csrf_field() !!}
  			<form method="GET" class="col-md-12 col-xs-12 col-sm-12 form-group" action="{{ action('PostsController@search') }}">
				Search: <input class="form-control" type="text" name="search" id="search">
				<input type="submit" value="submit">
			</form>
  		</li>
  		<li class=" btn-secondary dropdown">
	  		<a class="dropdown-toggle" data-toggle="dropdown">Navigation<span class="caret"></span></a>
	  		<ul	class="row dropdown-menu">
				<li><a href="{{ action('PostsController@index') }}">Index of Posts</a></li>
				<li><a href="{{ action('PostsController@create') }}">Create a new post</a></li>
				@if (Auth::check()) 
				<li><a href="{{ action('PostsController@account') }}">Edit Account</a></li> 
				<li><a href="{{ action('Auth\AuthController@getLogout') }}">Log Out</a></li>
	
				@else 

				<li><a href="{{ action('Auth\AuthController@getLogin') }}">Log In</a></li>

				@endif

			<!-- 	<li><a href="{{ action('HomeController@rolldice') }}">Dice Roll</a></li>
				<li><a href="{{ action('HomeController@add') }}">Add</a></li>
				<li><a href="{{ action('HomeController@increment') }}">Increment</a></li> -->
			</ul>
		</li>
	</div>
	<br>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>

	@if (Auth::check()) 
		<h4 class="col-xs-12 col-sm-12 col-md-12">Welcome: {{ Auth::user()->name }}</h4>
	@endif
		


</nav>
	