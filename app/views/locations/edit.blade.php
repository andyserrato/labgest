@extends('master')
@section('content')
<h1 class="page-header">Gestión de Ubicaciones</h1>
<div class="container">
  @if (Session::has('errors'))
    <div class="alert alert-danger">{{Session::get('message')}}</div>
  @endif
    {{ Form::model($location, array('action' => array('LocationController@update', $location->id),'class' => 'form-horizontal', 'role' => 'form')) }}
    {{ Form::hidden('_method', 'PUT') }}
    <div class="form-group"> 
    {{Form::label('nombre', 'Nombre', array('class'=>'label label-default', 'for'=>'name.locations.edit'))}}
    {{Form::text('nombre', null, array('placeholder' => 'Nombre', 'class' => 'form-control','id'=>'name.locations.edit'))}}
    </div>
    <div class="form-group">
    {{Form::label('direccion', 'Dirección', array('class'=>'label label-default', 'for'=>'direccion.locations.edit'))}}
    {{Form::text('direccion', null, array('placeholder' => 'Dirección', 'class' => 'form-control','id'=>'direccion.locations.edit'))}}
    </div>
    <div class="form-group">
    {{Form::label('telefono', 'Teléfono', array('class'=>'label label-default', 'for'=>'telefono.locations.edit'))}}
    {{Form::text('telefono', null, array('placeholder' => 'Teléfono', 'class' => 'form-control','id'=>'telefono.locations.edit'))}}
    </div>
    <div class="form-group">
    {{ Form::label('email', 'Email', array('class'=>'label label-default', 'for'=>'email.locations.edit'))}}
    {{ Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control','id'=>'email.locations.edit'))}}
    </div>
    <div class="form-group">
    {{Form::submit('Salvar',array('class' => 'btn btn-lg btn-primary btn-block'))}}
    </div>
{{ Form::close()}}
</div>
@stop
