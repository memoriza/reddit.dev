<nav class="navbar navbar-default navbar-static">
    <div class="container-fluid">
      <div class=" text-center navbar-header">
      		<h3> Reddit Cloned 
      			@if (Auth::check())
					<strong>|| Hello: {{ Auth::user()->name }}</strong>
				@endif
			</h3>
      	
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar6">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div id="navbar6" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Navigation<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">

            	<li class="dropdown-header">User Menu</li>
            	<li class="divider"></li>
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
        </ul>
        <form method="GET" class="navbar-form navbar-right" action="{{ action('PostsController@search') }}">
			{!! csrf_field() !!}
			<div class="img-responsive form-group">
				Search: <input class="form-control text-left" type="text" name="search" id="search">
			</div>
			<input class=" btn btn-primary" type="submit" value="submit">
		</form>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
</nav>




		
	