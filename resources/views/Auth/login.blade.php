@extends('layouts.master')

@section('content')

<!-- resources/views/auth/login.blade.php -->

<form method="POST" action="{{ action('Auth\AuthController@postLogin') }}">

    {!! csrf_field() !!}

    <div class ="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6"> Email
        <input class="form-control" type="email" name="email" value="{{ old('email') }}">
    </div>

    <div class ="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6 "> Password
        <input class="form-control" type="password" name="password" id="password">
    </div>

    <div class ="form-group">
        <input class="form-control" type="checkbox" name="remember"> Remember Me
    </div>

    <div class ="form-group">
        <button type="submit"> Login</button>
    </div>

</form>

@stop