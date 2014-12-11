@extends('master')

@section('content')
<h1 class="page-header">Gestión de Productos</h1>
<div class="container">
  @if (Session::has('errors'))
    <div class="alert alert-danger">Campos incorrectos en el formulario</div>
  @endif
      {{Form::model($product, array('action' => array('ProductController@update', $product->id), 'class' => 'form-horizontal', 'role' => 'form'))}}
    {{Form::hidden('_method', 'PUT')}}
    <div class="form-group">
      {{Form::label('iupac', 'IUPAC', array('class'=>'label label-default', 'for'=>'iupac.products.edit'))}}
      {{Form::text('iupac', null, array('placeholder' => 'IUPAC', 'class' => 'form-control','id'=>'iupac.products.edit'))}}
      {{ $errors->first('iupac')}}
    </div>
    <div class="form-group"> 
      {{Form::label('cas', 'CAS', array('class'=>'label label-default', 'for'=>'cas.products.edit'))}}
      {{Form::text('cas', null, array('placeholder' => 'CAS', 'class' => 'form-control','id'=>'cas.products.edit'))}}
      {{ $errors->first('cas')}}
    </div>
    <div class="form-group">
      {{Form::label('ce', 'CE', array('class'=>'label label-default', 'for'=>'ce.products.edit'))}}
      {{Form::text('ce', null, array('placeholder' => 'CE', 'class' => 'form-control','id'=>'ce.products.edit'))}}
      {{ $errors->first('ce')}}
    </div>
    <div class="form-group">
      {{Form::label('cantidad', 'Cantidad', array('class'=>'label label-default', 'for'=>'cantidad.products.edit'))}}
      {{Form::text('cantidad', null, array('placeholder' => 'Cantidad', 'class' => 'form-control','id'=>'cantidad.products.edit'))}}
      {{Form::label('Unit', 'Unidad de Medida', array('class'=>'label label-default', 'for'=>'unit_id.products.edit'))}}
      {{Form::select('unit_id', $unit_options,'',array('class' => 'form-control','id'=>'unit.products.edit'))}}
      {{ $errors->first('cantidad')}}
      {{ $errors->first('unit_id')}}
    </div>
    <div class="form-group">
      {{Form::label('Location', 'Ubicación', array('class'=>'label label-default', 'for'=>'location.products.edit'))}}
      {{Form::select('location_id', $location_options,'',array('class' => 'form-control','id'=>'location.products.edit'))}}
      {{ $errors->first('location_id')}}
    </div>
    <div class="form-group">
      {{Form::label('responsable', 'Responsable', array('class'=>'label label-default', 'for'=>'responsable.products.edit'))}}
      {{Form::text('responsable', null, array('placeholder' => 'Responsable', 'class' => 'form-control','id'=>'responsable.products.edit'))}}
      {{ $errors->first('responsable')}}
    </div>
    <div class="form-group">
      {{Form::label('notas', 'notas', array('class'=>'label label-default', 'for'=>'notas.products.edit'))}}
      {{Form::textarea('notas', null, array('placeholder' => 'Notas', 'class' => 'form-control','id'=>'notas.products.edit'))}}
      {{ $errors->first('notas')}}
    </div>
    <div class="form-group">
      {{Form::submit('Guardar', array('class' => 'btn btn-lg btn-primary btn-block'))}}
    </div>
    {{Form::close( )}}
</div>
@stop
