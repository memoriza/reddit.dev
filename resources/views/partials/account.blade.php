<form class="form-group" action="{{ action('PostsController@updateAccount',Auth::id() ) }}" method="POST">
{!! csrf_field() !!}
name: <input class="form-group" type="text" 
		name="name" 
		id="name" 
		@if(isset($user->name))
			value="{{ $user->name }}"
		@else
			value="{{ old('name') }}"
		@endif
		><br>
		@if ($errors->has('name'))
			{!! $errors->first('name', '<span class="help-block">Name error</span>') !!}

		@endif
		
email: <input class="form-group" type="text" 
		name="email" 
		id="email" 
		@if(isset($user->email))
			value="{{ $user->email }}"
		@else
			value="{{ old('email') }}"
		@endif
		><br>
		@if ($errors->has('email'))
			{!! $errors->first('email'), '<span class="help-block">Email ERROR</span>' !!}
		@endif

		<input type="submit" value="Submit">
</form>

