@extends('layouts.master')

@section('content')
    <h1>Hello,  {{ $name }}!</h1>
    <ul><a href="{{ action('HomeController@showWelcome') }}">home</a></ul>
	<ul><a href="{{ action('HomeController@increment">increment</a></ul>
	<ul><a href="{{ action('HomeController@uppercase">uppercase</a></ul>
@section('footer')
    <p>testing the feet</p>
@stop