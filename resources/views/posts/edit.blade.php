@extends('layouts.master')

@section('content')

	<h1>Edit a Post</h1>

	<form  class="form-group" action="{{ action('PostsController@update', $post->id) }}" method="POST">

		@include('partials.contacts-form')

		<input class ="btn btn-primary" type="submit" value="update information">

		{{ method_field('PUT') }}

	</form>

	<form  class="form-group" action="{{ action('PostsController@destroy', $post->id) }}" method="POST">
		
		{{ csrf_field() }}

		<input class = "btn btn-danger" type="submit" value="delete information">

		{{ method_field('DELETE') }}

	</form>

@stop

