@extends('layouts.master')

@section('content')


	<h1>Create a Post</h1>
		
		<form class="form-group" action="{{ action('PostsController@store') }}" method="POST">
			{!! csrf_field() !!}
			Title: <input type="text" name="title" id="title" value="{{old('title')}}"><br>
			Content: <input type="text" name="content"id="content" value="{{old('content')}}" ><br>
			Url: <input type="text" name="url" id="url" value="{{old('url')}}"><br>
			<input type="submit" value="Submit">
		</form>
    

    
@stop