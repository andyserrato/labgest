@extends('master')

@section('content')
<h1 class="page-header">Crear una cuenta LABGEST</h1>
<div class="container">
  @if (Session::has('errors'))
    <div class="alert alert-danger">Campos incorrectos en el formulario</div>
  @endif
  {{Form::open(array('action' => 'UserController@store','class' => 'form-horizontal', 'role' => 'form'))}} <!-- action paramete -->    
    <div class="form-group">
      {{Form::label('nombre', 'Nombre', array('class'=>'label label-default', 'for'=>'name.users.create'))}}
      {{Form::text('nombre',null, array('placeholder' => 'Nombre', 'class' => 'form-control','id'=>'name.users.create'))}}
      {{ $errors->first('nombre')}}
    </div>
    <div class="form-group">
      {{Form::label('email', 'Email',array('class'=>'label label-default', 'for'=>'email.users.create'))}}
      {{Form::text('email',null, array('placeholder' => 'Email', 'class' => 'form-control','id'=>'email.users.create'))}}
      {{ $errors->first('email')}}
    </div>
    <div class="form-group">
      {{Form::label('password', 'Contraseña',array('class'=>'label label-default', 'for'=>'password.users.create'))}}
      {{Form::password('password',array('placeholder' => 'Contraseña', 'class' => 'form-control','id'=>'password.users.create'))}}
      {{ $errors->first('password')}}
    </div>
    <div class="form-group">
      {{Form::label('telefono', 'Teléfono',array('class'=>'label label-default', 'for'=>'telefono.users.create'))}}
      {{Form::text('telefono',null, array('placeholder' => 'Teléfono', 'class' => 'form-control','id'=>'telefono.users.create'))}}
      {{ $errors->first('telefono')}}
    </div>
    <div class="form-group">
      {{Form::label('Type','Tipo de Usuario',array('class'=>'label label-default', 'for'=>'type.users.create'))}}
      {{Form::select('type_id', $type_options,'',array('class' => 'form-control','id'=>'type.users.create'))}}
      {{ $errors->first('type_id')}}
    </div>
    <div class="form-group">
      {{Form::label('Group','Grupo al que pertences',array('class'=>'label label-default', 'for'=>'group.users.create'))}}
      {{Form::select('group_id', $group_options,'',array('class' => 'form-control','id'=>'group.users.create'))}}
      {{ $errors->first('group_id')}}
    </div>
    <div class="form-group">
      {{Form::submit('Sign Up',array('class' => 'btn btn-lg btn-primary btn-block'))}}
    </div>
      {{Form::close( )}}
</div>
@stop


