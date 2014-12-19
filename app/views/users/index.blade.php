@extends('master')
@section('content')
<div class="col-md-12">
<h1 class="page-header">Gestión de usuarios</h1>
@if (Session::has('errors'))
    <div class="alert alert-danger">{{Session::remove('errors')}}</div>
@endif
  @if(isset($users))
    <table style="width:100%">
      <tr>
        <td>
            <h2 class="text-info">Total productos: {{$users->getTotal()}}</h2>
        </td>
        <td>
              <div class="text-right">
                        <h3 class="text-info">Mostrando: {{$users->count()}}</h3>
                       {{$users->links()}}
              </div>
        </td>
      </tr>
    </table>
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
    <div class="text-right">{{$users->links()}}</div>
    @else
      Todavía no hay nigún usuario regsitrado
    @endif
  </div>
@stop
        