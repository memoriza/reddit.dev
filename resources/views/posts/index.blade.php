@extends('layouts.master')

@section('content')

<h1>Posts from Users</h1>
<div>
	@foreach ($posts as $post)
		<div>
			<div>
				<a href="{{ action('PostsController@edit', [$post->id]) }}">
					Title: {{ $post->title }}
				</a>
			</div><br>
			<div>
				Content: {{ $post->content }}
			</div><br>
			<div>
				URL: {{ $post->url }}
			</div><br>
			<div>
				Time created: {{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}
			</div><br>
		</div>

	@endforeach
	<a class="col-md-12"href="{{ action('PostsController@create') }}">Create a Post</a>
</div>

<p class="pagination">{!! $posts->render() !!}</p>
<br>
@stop