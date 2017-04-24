@extends('layouts.master')

@section('header')
    <p>this is the header dude</p>
@section('content')
    <h1> You entered: {{$word}} <br> Uppercased: {{ $upperword }} !</h1>
@section('footer')
    <p>testing the feet</p>
@stop