@extends('master')
@section('content')
<h1 class="page-header">Gestión de Tipos de Usuarios</h1>
<div class="col-md-12">
  @if (Session::has('errors'))
    <div class="alert alert-danger">Campos incorrectos en el formulario</div>
  @endif
    {{ Form::open(array('action' => 'TypeController@store', 'class' => 'form-horizontal', 'role' => 'form'))}} <!-- action paramete -->    
<div class="form-group">
    {{Form::label('tipo', 'Tipo', array('class'=>'label label-default', 'for'=>'tipo.types.edit'))}}
    {{Form::text('tipo', null, array('placeholder' => 'Tipo', 'class' => 'form-control','id'=>'tipo.types.edit'))}}
    {{ $errors->first('tipo')}}
    </div>
    <div class="form-group">
      {{Form::submit('Guardar nuevo tipo de usuario', array('class' => 'btn btn-lg btn-primary btn-block'))}}
    </div>
{{ Form::close( )}}
</div>
@stop

