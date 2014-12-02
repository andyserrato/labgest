@extends('master')

@section('content')

    <h1>Log Out</h1>
    <article class="post">
      <p>You have successfully logged out.<a href="{{URL::to('/login')}}">Log In?</a></p>
      </article>

@stop