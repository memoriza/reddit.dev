@extends('layouts.master')

@section('content')

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

	<h1>Posts from Users</h1>

	@foreach ($posts as $post)
	<br>
		<div>

			<div>
				<a href="{{ action('PostsController@show', [$post->id]) }}">
					Title: {{ $post->title }}
				</a>
			</div><br>

			<p>Written by: {{$post->user->name}}</p>

			<div>
				Content: {{ $post->content }}
			</div>

			<div>
				URL: {{ $post->url }}
			</div>

			<div>
				Time created: {{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}
			</div><br>
			
			<p class=" btn btn-sm">{{ $post->votes->sum('status') }}</p>

			<a class="btn btn-sm btn-success upvote" data-post="{{$post->id}}"  href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
			<a class="btn btn-sm btn-danger downvote" data-post="{{$post->id}}"  href="#"><i class="fa fa-thumbs-down" aria-hidden="true"></i></a>

	
		</div>

	@endforeach
	<br>

	<a class="btn btn-success"href="{{ action('PostsController@create') }}">Create a Post</a> <br>
	<p class="pagination">{!! $posts->render() !!}</p>

</div>


@stop

@section('scripts')

<script> 

	console.log($(".upvote").length);

	$(".upvote").click(function(e){
		console.log('?');
		e.preventDefault();	

		var request = $.ajax( '{{ action("PostsController@vote") }}', {method:"POST", data:{action:1, post:$(this).data('post'), _token:'{{ csrf_token() }}' }} );

		request.done(function(response) {

			console.log(request);

		});


		request.fail(function(error) {
			console.log(error.responseText);
		});
	});

	$(".downvote").click(function(e){

		e.preventDefault();	

		var request = $.ajax( '{{ action("PostsController@vote") }}', {method:"POST", data:{action:-1, post:$(this).data('post'), _token:'{{ csrf_token() }}' }} );

		request.done(function(response) {

			console.log(request);

		});

		request.fail(function(error) {
			console.log(error);
		});
	});

</script>

@stop