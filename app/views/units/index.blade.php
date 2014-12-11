@extends('master')
@section('content')
<h1 class="page-header">Gestión de Unidades de Medida</h1>
  @if(isset($units))
    <h2>{{$units->count()}} Unidades</h2>
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
    @else
    	Toodavía no hay niguna unidad de medida registrada
    @endif
    {{ HTML::link('unit/create', 'Crear Unidad de Medida', array('class' => 'btn btn-default btn-lg'))}}

@stop
