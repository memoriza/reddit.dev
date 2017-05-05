@extends('layouts.master')

@section('content')


	<h1>Create a Post</h1>
		
		<form class="form-group" action="{{ action('PostsController@store') }}" method="POST">
			
			@include('partials.contacts-form')

			<input class="btn btn-success" type="submit" value="Submit">
		</form>
    

    
@stop