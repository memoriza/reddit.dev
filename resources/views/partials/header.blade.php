<nav class="navbar navbar-default">
	<div class="container-fluid">
  	    <div class="navbar-header">
      		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        	<span class="sr-only">Toggle navigation</span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
      		</button>
      		<a class="navbar-brand" href="{{ action('PostsController@index') }}">Reddit is dead</a>
    	</div>
    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   			<ul class="nav navbar-nav">	
	  			<li class="dropdown">
		  			<a class="dropdown-toggle" data-toggle="dropdown">Navigation<span class="caret"></span></a>
			  		<ul	class="row dropdown-menu">
						<li><a href="{{ action('PostsController@index') }}">Index of Posts</a></li>
						<li><a href="{{ action('PostsController@create') }}">Create a new post</a></li>
						<li><a href="{{ action('Auth\AuthController@getRegister') }}">User Registration</a></li>
						@if (Auth::check()) 
							<li><a href="{{ action('PostsController@account',Auth::id()) }}">Edit Account</a></li>
							<li><a href="{{ action('PostsController@password',Auth::id()) }}">Edit Password</a></li>  
							<li><a href="{{ action('Auth\AuthController@getLogout') }}">Log Out</a></li>

						@else 

							<li><a href="{{ action('Auth\AuthController@getLogin') }}">Log In</a></li>

						@endif

					</ul>
				</li>
				<li>
					<form method="GET" class="navbar-form navbar-left" action="{{ action('PostsController@search') }}">
						{!! csrf_field() !!}
						<div class="form-group">
							Search: <input class="form-control" type="text" name="search" id="search">
						</div>
						<input class=" btn btn-primary" type="submit" value="submit">
					</form>
				</li>
			</ul>
		</div>
	</div>
</nav>


		
	