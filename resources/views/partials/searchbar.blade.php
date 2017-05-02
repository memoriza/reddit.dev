{!! csrf_field() !!}

<form method="GET" class="col-md-12 col-xs-12 col-sm- form-group" action="{{ action('PostsController@search') }}">
	Search: <input class="form-control" type="text" name="search" id="search">
	<input type="submit" value="Submit">
</form>
