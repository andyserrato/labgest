@extends('master')

@section('content')
<div class="col-md-11">
	 <h1 class="page-header">Crear nueva unidad de medida</h1>
	@if (Session::has('errors'))
    <div class="alert alert-danger">Campos incorrectos en el formulario</div>
  @endif
       {{ Form::open(array('action' => 'UnitController@store', 'class' => 'form-horizontal', 'role' => 'form'))}} 
<div class="form-group">
    {{Form::label('unidad', 'Unidad', array('class'=>'label label-default', 'for'=>'unidad.unit.create'))}}
    {{Form::text('unidad', null, array('placeholder' => 'Unidad', 'class' => 'form-control','id'=>'unidad.unit.create'))}}
    {{ $errors->first('unidad')}}
 </div>
    <div class="form-group">
    {{Form::submit('Crear Unidad de Medida', array('class' => 'btn btn-lg btn-primary btn-block'))}}
</div>
{{ Form::close( )}}
</div>
@stop

