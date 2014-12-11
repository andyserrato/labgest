@extends('master')
@section('content')
<h1 class="page-header">Gestión de Tipos de Usuarios</h1>
<div class="container">
  @if (Session::has('errors'))
    <div class="alert alert-danger">Campos incorrectos en el formulario</div>
  @endif
    {{ Form::model($type, array('action' => array('TypeController@update', $type->id), 'class' => 'form-horizontal', 'role' => 'form'))}}
    {{ Form::hidden('_method', 'PUT') }}
    <div class="form-group">
    {{Form::label('tipo', 'Tipo', array('class'=>'label label-default', 'for'=>'tipo.types.edit'))}}
    {{Form::text('tipo', null, array('placeholder' => 'Tipo', 'class' => 'form-control','id'=>'tipo.types.edit'))}}
    {{ $errors->first('tipo')}}
    </div>
    <div class="form-group">
      {{Form::submit('Guardar', array('class' => 'btn btn-lg btn-primary btn-block'))}}
    </div>
{{ Form::close( )}}
</div>
@stop


