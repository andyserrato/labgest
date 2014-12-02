@extends('master')
@section('content')
<h1 class="page-header">Gestión de Usuarios</h1>
  @if(isset($users))
    <h2>{{$users->count()}} Usuarios</h2>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Email</th>
          <th>Teléfono</th>
          <th>Tipo</th>
          <th>Grupo</th>
        </tr>
        </thead>
        <tbody>
      	@foreach($users as $user)
          <tr>
           	<td>{{$user->id}}</td>
        	  <td>{{$user->nombre}}</td>
        	  <td>{{$user->email}}</td>
        	  <td>{{$user->telefono}}</td>
        	  <td>{{$user->type->tipo}}</td>
        	  <td>{{$user->group->nombre}}</td>
            <td>
              {{ HTML::link('user/' . $user->id . '/edit', 'Editar', array('class' => 'btn btn-default btn-sm'))}}
              {{ Form::open(array('url' => 'user/' . $user->id, 'class' => 'pull-right')) }}
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
    	Todavía no hay nigún usuario regsitrado
    @endif
    {{ HTML::link('user/create', 'Crear Usuario', array('class' => 'btn btn-default btn-lg'))}}

@stop
        