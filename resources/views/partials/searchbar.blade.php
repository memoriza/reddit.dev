<form method="GET" class="navbar-form navbar-left" action="{{ action('PostsController@search') }}">
	{!! csrf_field() !!}
	<div class="form-group">
		Search: <input class="form-control" type="text" name="search" id="search">
	</div>
	<input class=" btn btn-primary" type="submit" value="submit">
</form>
