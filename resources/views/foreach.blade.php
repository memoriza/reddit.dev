@extends('layouts.master')
@section('header')
	<p> what is up </P>
@section('content')
   @foreach (range($start,$end) as $number)
   		<p> {{ $number }} </p>
   	@endforeach
@stop
@section('footer')
    <p>testing the feet</p>
@stop