@extends('master')
@section('content')
<h1 class="page-header">Gestión de Grupos</h1>
<div class="container">
@if (Session::has('errors'))
    <div class="alert alert-danger">{{Session::remove('errors')}}</div>
@endif
    @if($groups)
    <h2>{{$groups->count()}} Grupos</h2>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Email</th>
          <th>Teléfono</th>
        </tr>
      </thead>
      <tbody>
    		@foreach($groups as $group)
            <tr>
    			<td>{{$group->id}} </td>
    			<td>{{$group->nombre}} </td>
    			<td>{{$group->email}} </td>
    			<td>{{$group->telefono}} </td>
                <td>
                {{ HTML::link('group/' . $group->id . '/edit', 'Editar', array('class' => 'btn btn-default btn-sm'))}}
                {{ Form::open(array('url' => 'group/' . $group->id, 'class' => 'pull-right')) }}
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
    	Toodavía no hay nigún Grupo registrado
    @endif
    {{ HTML::link('group/create', 'Crear Grupo', array('class' => 'btn btn-default btn-lg'))}}
</div>
@stop
