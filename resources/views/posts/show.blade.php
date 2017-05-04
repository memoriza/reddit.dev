@extends('layouts.master')

@section('content')
	<div>
		<h5>Title: {!!$post->title;!!}</h5>
		<p>Written by: {{$post->user->name}}</p>
		<p>Url: {!!$post->url; !!}</p>
		<p>Content: {!!$post->content;!!}</p>
	</div>

	<a class ="btn-success btn" href="{{ action('PostsController@index') }}">Back to Posts</a>

@stop