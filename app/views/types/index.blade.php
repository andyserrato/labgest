@extends('master')
@section('content')
<h1 class="page-header">Gestión de Tipo de Usuarios</h1>
<div class="container">
@if (Session::has('errors'))
    <div class="alert alert-danger">{{Session::remove('errors')}}</div>
  @endif
  @if(isset($types))
    <h2>{{$types->count()}} Tipos de Usuarios</h2>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
        <tr>
          <th>#</th>
          <th>Tipo</th>
        </tr>
        </thead>
        <tbody>
   		@foreach($types as $type)
        <tr>
    			<td>{{$type->id}}</td>
    			<td>{{$type->tipo}}</td>
                <td>
                {{ HTML::link('type/' . $type->id . '/edit', 'Editar', array('class' => 'btn btn-default btn-sm'))}}
                {{ Form::open(array('url' => 'type/' . $type->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Eliminar', array('class' => 'btn btn-default btn-sm')) }}
                {{ Form::close() }}
                </td>
        </tr>
    		@endforeach
    	</tbody>
        </table>
        </div>
    @else
    	Toodavía no hay nigún Tipo de usuario registrado
    @endif
    {{ HTML::link('type/create', 'Crear Tipo de usuario', array('class' => 'btn btn-default btn-lg'))}}
</div>
@stop
