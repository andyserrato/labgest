@extends('master')

@section('content')
    <h1>CREAR UNIDAD DE MEDIDA</h1>
    {{ Form::open(array('action' => 'UnitController@store'))}} <!-- action paramete -->    

    {{Form::label('unidad', 'Unidad')}}
    {{Form::text('unidad')}}
    
    {{Form::submit('Crear Unidad de Medida')}}
{{ Form::close( )}}
@stop