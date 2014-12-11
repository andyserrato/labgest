@extends('master')
@section('content')
<div class="col-md-12">
<h1 class="page-header">Gestión de localizaciones</h1>
@if (Session::has('errors'))
    <div class="alert alert-danger">{{Session::remove('errors')}}</div>
@endif
  @if(isset($locations))
    <h2 class="text-info">Total localizaciones: {{$locations->count()}} </h2>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Dirección</th>
          <th>Teléfono</th>
          <th>Email</th>
        </tr>
        </thead>
        <tbody>
      @foreach($locations as $location)
      <tr>
      <td>{{$location->id}}</td>
      <td>{{$location->nombre}}</td>
      <td>{{$location->direccion}}</td>
      <td>{{$location->telefono}} </td>
        <td>{{$location->email}}</td>
        <td>
        {{HTML::link('location/' . $location->id . '/edit', 'Editar', array('class' => 'btn btn-default btn-sm'))}}
        {{Form::open(array('url' => 'location/' . $location->id, 'class' => 'pull-right'))}}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Eliminar Ubicación', array('class' => 'btn btn-default btn-sm'))}}
        {{Form::close()}}
        </td>
    </tr>
  @endforeach
    </tbody>
    </table>
    </div>
    @else
      Toodavía no hay nigún Ubicación registrado
    @endif
  </div>
@stop
