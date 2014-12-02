
@extends('master')

@section('content')
<h1 class="page-header">Iniciar Sesión</h1>
<div class="container">
  @if (Session::has('login_errors'))
    <div class="alert alert-danger">Email o contraseña incorrectos</div>
  @endif
    {{Form::open(array('action' => 'SessionController@store', 'class' => 'form-signin', 'role' => 'form'))}}
      <div class="form-group">
        {{Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control'))}}
      </div>
      <div class="form-group">
        {{Form::password('password', array('class'=>'form-control','placeholder'=>'Contraseña'))}}
      </div>
      <div class="form-group">
      {{Form::submit('Iniciar sesión',array('class' => 'btn btn-lg btn-primary btn-block'))}}
      </div>
    {{ Form::close() }}
    {{ HTML::link('user/create', 'Registrarse',array('class' => 'btn btn-lg btn-default btn-block'))}}
</div>
@stop

