{!! csrf_field() !!}

Title: <input class="form-group" type="text" 
		name="title" 
		id="title" 
		@if(isset($post->title))
			value="{{ $post->title }}"
		@else
			value="{{ old('title') }}"
		@endif
		><br>
		@if ($errors->has('title'))
			{!! $errors->first('title', '<span class="help-block">Title error</span>') !!}

		@endif
		
Url: <input class="form-group" type="text" 
		name="url" 
		id="url" 
		@if(isset($post->url))
			value="{{ $post->url }}"
		@else
			value="{{ old('url') }}"
		@endif
		><br>
		@if ($errors->has('url'))
			{!! $errors->first('url'), '<span class="help-block">URL ERROR</span>' !!}
		@endif

Content: <input class="form-group" type="text" 
		name="content"
		id="content" 
		@if(isset($post->content))
			value="{{ $post->content }}"
		@else
			value="{{ old('content') }}"
		@endif
		><br>
		@if ($errors->has('content'))
			{!! $errors->first('content', '<span class="help-block">Content ERROR</span>') !!}

		@endif
