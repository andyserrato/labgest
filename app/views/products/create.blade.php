@extends('master')

@section('content')
<h1 class="page-header">Creación de Productos</h1>
<div class="container">
  @if (Session::has('errors'))
    <div class="alert alert-danger">{{Session::get('message')}}</div>
  @endif
      {{Form::open(array('action' => 'ProductController@store', 'class' => 'form-horizontal', 'role' => 'form'))}} <!-- action paramete -->      
    <div class="form-group">
      {{Form::label('iupac', 'IUPAC', array('class'=>'label label-default', 'for'=>'iupac.products.create'))}}
      {{Form::text('iupac', null, array('placeholder' => 'IUPAC', 'class' => 'form-control','id'=>'iupac.products.create'))}}
    </div>
    <div class="form-group"> 
      {{Form::label('cas', 'CAS', array('class'=>'label label-default', 'for'=>'cas.products.create'))}}
      {{Form::text('cas', null, array('placeholder' => 'CAS', 'class' => 'form-control','id'=>'cas.products.create'))}}
    </div>
    <div class="form-group">
      {{Form::label('ce', 'CE', array('class'=>'label label-default', 'for'=>'ce.products.create'))}}
      {{Form::text('ce', null, array('placeholder' => 'CE', 'class' => 'form-control','id'=>'ce.products.create'))}}
    </div>
    <div class="form-group">
      {{Form::label('cantidad', 'Cantidad', array('class'=>'label label-default', 'for'=>'cantidad.products.create'))}}
      {{Form::text('cantidad', null, array('placeholder' => 'Cantidad', 'class' => 'form-control','id'=>'cantidad.products.create'))}}
      {{Form::label('Unit', 'Unidad de Medida', array('class'=>'label label-default', 'for'=>'unit_id.products.create'))}}
      {{Form::select('unit_id', $unit_options,'',array('class' => 'form-control','id'=>'unit.products.create'))}}
    </div>
    <div class="form-group">
      {{Form::label('Location', 'Ubicación', array('class'=>'label label-default', 'for'=>'location.products.create'))}}
      {{Form::select('location_id', $location_options,'',array('class' => 'form-control','id'=>'location.products.create'))}}
    </div>
    <div class="form-group">
      {{Form::label('responsable', 'Responsable', array('class'=>'label label-default', 'for'=>'responsable.products.create'))}}
      {{Form::text('responsable', null, array('placeholder' => 'Responsable', 'class' => 'form-control','id'=>'responsable.products.create'))}}
    </div>
    <div class="form-group">
      {{Form::label('notas', 'notas', array('class'=>'label label-default', 'for'=>'notas.products.create'))}}
      {{Form::textarea('notas', null, array('placeholder' => 'Notas', 'class' => 'form-control','id'=>'notas.products.create'))}}
    </div>
    <div class="form-group">
      {{Form::submit('Crear', array('class' => 'btn btn-lg btn-primary btn-block'))}}
    </div>
    {{Form::close( )}}
</div>