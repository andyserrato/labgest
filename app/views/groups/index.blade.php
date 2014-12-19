@extends('master')
@section('content')
<div class="col-md-12">
<h1 class="page-header">Gestión de Grupos</h1>
@if (Session::has('errors'))
    <div class="alert alert-danger">{{Session::remove('errors')}}</div>
@endif
    @if($groups)
    <table style="width:100%">
      <tr>
        <td>
            <h2 class="text-info">Total productos: {{$groups->getTotal()}}</h2>
        </td>
        <td>
              <div class="text-right">
                        <h3 class="text-info">Mostrando: {{$groups->count()}}</h3>
                       {{$groups->links()}}
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
                <div class="text-right">{{$groups->links()}}</div>
  
    @else
        Toodavía no hay nigún Grupo registrado
    @endif

@stop

