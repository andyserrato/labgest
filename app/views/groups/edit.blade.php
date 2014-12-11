@extends('master')
@section('content')
<h1 class="page-header">Gestión de Grupos</h1>
<div class="col-md-11">
  @if (Session::has('errors'))
    <div class="alert alert-danger">Campos incorrectos en el formulario</div>
  @endif
  {{Form::model($group, array('action' => array('GroupController@update', $group->id), 'class' => 'form-horizontal', 'role' => 'form'))}}
  {{Form::hidden('_method', 'PUT') }}
    <div class="form-group">
      {{Form::label('nombre', 'Nombre', array('class'=>'label label-default', 'for'=>'name.groups.edit'))}}
      {{Form::text('nombre', null, array('placeholder' => 'Nombre', 'class' => 'form-control','id'=>'name.groups.edit'))}}
      {{ $errors->first('nombre')}}
    </div>
    <div class="form-group">
      {{Form::label('email', 'Email', array('class'=>'label label-default', 'for'=>'email.groups.edit'))}}
      {{Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control','id'=>'email.groups.edit'))}}
      {{ $errors->first('email')}}
    </div>
    <div class="form-group">
      {{Form::label('telefono', 'Teléfono', array('class'=>'label label-default', 'for'=>'telefono.groups.edit'))}}
      {{Form::text('telefono', null, array('placeholder' => 'Teléfono', 'class' => 'form-control','id'=>'telefono.groups.edit'))}}
      {{ $errors->first('telefono')}}
    </div>
    <div class="form-group">
      {{Form::submit('Guardar', array('class' => 'btn btn-lg btn-primary btn-block'))}}
    </div>
  {{Form::close()}}
</div>
@stop




