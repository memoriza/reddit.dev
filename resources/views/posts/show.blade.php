@extends('layouts.master')

@section('content')
	<h3>{!!$post->title;!!}</h3><br>
	<h3>{!!$post->content;!!}</h3><br>
	<h3>{!!$post->url; !!}</h3><br>

	<p class ="btn btn-outline-success"><a href="{{ action('PostsController@index') }}">Index of Posts</a></p>
@stop