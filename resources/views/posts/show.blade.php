@extends('layouts.master')

@section('content')

	<h3>Title: {!!$post->title;!!}</h3><br>
	<h3>Written by: {{$post->user->name}}</h3>
	<h3>Url {!!$post->url; !!}</h3><br>
	<h3>Content {!!$post->content;!!}</h3><br>
	

	<p class ="btn btn-outline-success"><a href="{{ action('PostsController@index') }}">Index of Posts</a></p>
@stop