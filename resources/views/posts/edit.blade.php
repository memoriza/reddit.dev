@extends('layouts.master')

@section('content')
	<h1>Edit a contact</h1>

		<form  class="form-group" action="{{ action('PostsController@update') }}" method="POST">
			@include('partials.contacts-form')
	
			<input type="submit" value="update information">
			{{ method_field('PUT') }}
		</form>

		<form  class="form-group" action="{{ action('PostsController@destroy') }}" method="POST">
			
			{!! csrf_field() !!}
	
			<input type="submit" value="delete information">

			{{ method_field('DELETE') }}

		</form>
    
@stop