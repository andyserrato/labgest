@extends('master')
@section('content')
<h1 class="page-header">Gestión de Tipos de Usuarios</h1>
<div class="container">
  @if (Session::has('errors'))
    <div class="alert alert-danger">{{Session::get('message')}}</div>
  @endif
    {{Form::model($unit, array('action' => array('UnitController@update', $unit->id), 'class' => 'form-horizontal', 'role' => 'form')) }}
    {{Form::hidden('_method', 'PUT') }}
    <div class="form-group">
    {{Form::label('unidad', 'Unidad', array('class'=>'label label-default', 'for'=>'unidad.units.edit'))}}
    {{Form::text('unidad', null, array('placeholder' => 'Unidad', 'class' => 'form-control','id'=>'unidad.units.edit'))}}
    </div>
    <div class="form-group">
    {{Form::submit('Guardar', array('class' => 'btn btn-lg btn-primary btn-block'))}}
    </div>
{{ Form::close( )}}
@stop
