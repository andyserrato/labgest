@extends('master')

@section('content')
<h1 class="page-header">Gestión de Grupos</h1>
<div class="container">
  @if (Session::has('errors'))
    <div class="alert alert-danger">{{Session::get('message')}}</div>
  @endif
  {{Form::open(array('action' => 'GroupController@store','class' => 'form-horizontal','role' => 'form'))}}
    <div class="form-group">
      {{Form::label('nombre', 'Nombre', array('class'=>'label label-default', 'for'=>'name.groups.edit'))}}
      {{Form::text('nombre', null, array('placeholder' => 'Nombre', 'class' => 'form-control','id'=>'name.groups.edit'))}}
    </div>
    <div class="form-group">
      {{Form::label('email', 'Email', array('class'=>'label label-default', 'for'=>'email.groups.edit'))}}
      {{Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control','id'=>'email.groups.edit'))}}
    </div>
    <div class="form-group">
      {{Form::label('telefono', 'Teléfono', array('class'=>'label label-default', 'for'=>'telefono.groups.edit'))}}
      {{Form::text('telefono', null, array('placeholder' => 'Teléfono', 'class' => 'form-control','id'=>'telefono.groups.edit'))}}
    </div>
    <div class="form-group">
      {{Form::submit('Guardar', array('class' => 'btn btn-lg btn-primary btn-block'))}}
    </div>
  {{Form::close( )}}
</div>
@stop
