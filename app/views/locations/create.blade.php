@extends('master')
@section('content')
<h1 class="page-header">Gestión de Ubicaciones</h1>
<div class="col-md-12">
  @if (Session::has('errors'))
    <div class="alert alert-danger">Campos incorrectos en el formulario</div>
  @endif
    {{Form::open(array('action' => 'LocationController@store','class' => 'form-horizontal', 'role' => 'form'))}} <!-- action paramete -->    
    <div class="form-group"> 
    {{Form::label('nombre', 'Nombre', array('class'=>'label label-default', 'for'=>'name.locations.create'))}}
    {{Form::text('nombre', null, array('placeholder' => 'Nombre', 'class' => 'form-control','id'=>'name.locations.create'))}}
    {{ $errors->first('nombre')}}
    </div>
    <div class="form-group">
    {{Form::label('direccion', 'Dirección', array('class'=>'label label-default', 'for'=>'direccion.locations.create'))}}
    {{Form::text('direccion', null, array('placeholder' => 'Dirección', 'class' => 'form-control','id'=>'direccion.locations.create'))}}
    {{ $errors->first('direccion')}}
    </div>
    <div class="form-group">
    {{Form::label('telefono', 'Teléfono', array('class'=>'label label-default', 'for'=>'telefono.locations.create'))}}
    {{Form::text('telefono', null, array('placeholder' => 'Teléfono', 'class' => 'form-control','id'=>'telefono.locations.create'))}}
    {{ $errors->first('telefono')}}
    </div>
    <div class="form-group">
    {{ Form::label('email', 'Email', array('class'=>'label label-default', 'for'=>'email.locations.create'))}}
    {{ Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control','id'=>'email.locations.create'))}}
    {{ $errors->first('email')}}
    </div>
    <div class="form-group">
    {{Form::submit('Guardar localización',array('class' => 'btn btn-lg btn-primary btn-block'))}}
    </div>
{{ Form::close()}}
</div>
@stop
