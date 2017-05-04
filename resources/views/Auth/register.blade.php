@extends('layouts.master')

@section('content')


<form method="POST" action="{{ action('Auth\AuthController@postRegister') }}">

    {!! csrf_field() !!}

    <div class="form-group">name
        <input class="form-control" type="name" name="name" value="{{ old('name') }}">
        @if( $errors->has('name') )
        	{{ $errors->first('name') }}
        @endif
    </div>

    <div class="form-group">email
        <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}">
         @if( $errors->has('email') )
        	{{ $errors->first('email') }}
        @endif
    </div>

    <div class="form-group">password
        <input class="form-control" type="password" name="password">
         @if( $errors->has('password') )
        	{{ $errors->first('password') }}
        @endif
    </div>

    <div class="form-group">confirm password
        <input class="form-control" type="password" name="password_confirmation">
         @if( $errors->has('password') )
        	{{ $errors->first('password') }}
        @endif
    </div>

    <div class="form-group">
        <button class ="btn btn-primary" type="submit">Register</button>
    </div>

</form>

@stop