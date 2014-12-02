@extends('master')

@section('content')
    <h1>UNIDAD DE MEDIDA EDITAR</h1>
    {{ Form::model($unit, array('action' => array('UnitController@update', $unit->id))) }}
    {{ Form::hidden('_method', 'PUT') }}
    
    {{Form::label('unidad', 'Unidad')}}
    {{Form::text('unidad')}}
    
    {{Form::submit('Salvar')}}
{{ Form::close( )}}
@stop
