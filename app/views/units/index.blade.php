@extends('master')
@section('content')
<div class="col-md-12">
<h1 class="page-header">Gestión de Unidades de Medida</h1>
@if (Session::has('errors'))
    <div class="alert alert-danger">{{Session::remove('errors')}}</div>
@endif
  @if(isset($units))
    <h2 class="text-info">Total unidades de medida: {{$units->count()}} </h2>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
        <tr>
          <th>#</th>
          <th>Unidad</th>
        </tr>
        </thead>
        <tbody>
            @foreach($units as $unit)
            <tr>
                <td>{{$unit->id}}</td>
                <td>{{$unit->unidad}}</td>
                <td>
                {{ HTML::link('unit/' . $unit->id . '/edit', 'Editar', array('class' => 'btn btn-default btn-sm'))}}
                {{ Form::open(array('url' => 'unit/' . $unit->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Eliminar', array('class' => 'btn btn-default btn-sm')) }}
                {{ Form::close() }}
                </td>
            </tr>
            @endforeach
        </ul>
    </tbody>
</table>
</div>
    
    @else
        Toodavía no hay niguna unidad de medida registrada
    @endif
   </div>
@stop
