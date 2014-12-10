@extends('master')

@section('content')
<h1 class="page-header">Gestión de Usuarios</h1>
<div class="container">
  @if (Session::has('errors'))
    <div class="alert alert-danger">Campos incorrectos en el formulario</div>
  @endif
  {{Form::model($user, array('action' => array('UserController@update', $user->id), 'class' => 'form-horizontal', 'role' => 'form')) }}
    {{Form::hidden('_method', 'PUT') }}
    <div class="form-group"> 
      {{Form::label('nombre', 'Nombre', array('class'=>'label label-default', 'for'=>'name.users.edit'))}}
      {{Form::text('nombre', null, array('placeholder' => 'Nombre', 'class' => 'form-control','id'=>'name.users.edit'))}}
      {{ $errors->first('nombre')}}
    </div>
    <div class="form-group">
      {{Form::label('email', 'Email',array('class'=>'label label-default', 'for'=>'email.users.edit'))}}
      {{Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control','id'=>'email.users.edit'))}}
      {{ $errors->first('email')}}
    </div>
    <div class="form-group">
      {{Form::label('password', 'Contraseña',array('class'=>'label label-default', 'for'=>'password.users.edit'))}}
      {{Form::password('password', array('placeholder' => 'Contraseña', 'class' => 'form-control','id'=>'password.users.edit'))}}
      {{ $errors->first('password')}}
    </div>
    <div class="form-group">
      {{Form::label('telefono', 'Teléfono', array('class'=>'label label-default', 'for'=>'telefono.users.edit'))}}
      {{Form::text('telefono', null, array('placeholder' => 'Teléfono', 'class' => 'form-control','id'=>'telefono.users.edit'))}}
      {{ $errors->first('telefono')}}
    </div>
    <div class="form-group">
      {{Form::label('Type','Tipo de Usuario', array('class'=>'label label-default', 'for'=>'type.users.edit'))}}
      {{Form::select('type_id', $type_options,'',array('class' => 'form-control','id'=>'type.users.edit'))}}
      {{ $errors->first('type_id')}}
    </div>
    <div class="form-group">
      {{Form::label('Group','Grupo al que pertences', array('class'=>'label label-default', 'for'=>'group.users.edit'))}}
      {{Form::select('group_id',$group_options,'',array('class' => 'form-control','id'=>'group.users.edit'))}}
      {{ $errors->first('group_id')}}
    </div>
    <div class="form-group">
      {{Form::submit('Guardar', array('class' => 'btn btn-lg btn-primary btn-block'))}}
    </div>
  {{ Form::close( )}}
</div>
@stop
