@extends('master')

@section('content')
  <h1 class="page-header">Productos </h1>
  <div class="row">

  {{Form::open(array('action' => 'ProductController@search', 'role' => 'form', 'class' => 'form-inline'))}}
    {{Form::text('keyword', null, array('placeholder'=>'Término de Búsqueda', 'class' => 'form-control' ))}}
    {{Form::select('field', array(  'cas' => 'CAS',
                    'ce' => 'CE',
                    'iupac' => 'IUPAC'),
                    'cas', array('class' => 'form-control'))}}
    {{Form::submit('Buscar',array('class' => 'btn btn-default btn'))}}
  {{Form::close()}}
  </div>
  @if(isset($results))
    <h1>RESULTADOS DE BÚSQUEDA</h1>
    <h2>Se han encontrado {{$results->count()}} productos</h2>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
        <tr>
          <th>#</th>
          <th>IUPAC</th>
          <th>CAS</th>
          <th>CE</th>
          <th>Cantidad</th>
          <th>Unidad</th>
          <th>Ubicación</th>
          <th>Responsable</th>
          <th>Modificado</th>
        </tr>
      </thead>
      <tbody>
        @foreach($results as $result)
        <tr>
            <td>{{$result->id}} </td>
            <td>{{$result->iupac}} </td>
            <td>{{$result->cas}} </td>
            <td>{{$result->ce}} </td>
            <td>{{$result->cantidad}}</td>
            <td>{{$result->unit->unidad}}</td>
            <td>{{$result->location->nombre}} </td>
            <td>{{$result->responsable}} </td>
            <td>{{$result->user->nombre}} </td>
        @if(Auth::check())
        <td>
          {{ HTML::link('product/' . $result->id . '/edit', 'Editar', array('class' => 'btn btn-default btn-sm'))}}
          {{ Form::open(array('url' => 'product/' . $result->id, 'class' => 'pull-right')) }}
          {{ Form::hidden('_method', 'DELETE') }}
          {{ Form::submit('Eliminar', array('class' => 'btn btn-default btn-sm')) }}
          {{ Form::close() }}
        </td>
        @endif
        <tr><th>Notas</th>
            <td colspan="9">{{$result->notas}} </td>
        </tr>
        </tr>
      @endforeach
    </tbody>
    </table>
    </div>
  @else
    @if (Session::has('errors'))
      <div class="alert alert-success">
        {{Session::get('errors')}}
      </div>
    @endif
  @endif

  @if(Auth::check())
    <h1>MOSTRAR TODOS LOS PRODUCTOS</h1>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
        <tr>
          <th>#</th>
          <th>IUPAC</th>
          <th>CAS</th>
          <th>CE</th>
          <th>Cantidad</th>
          <th>Unidad</th>
          <th>Ubicación</th>
          <th>Responsable</th>
          <th>Modificado</th>
        </tr>
      </thead>
      <tbody>
    @if(isset($products))
      
        @foreach($products as $product)
        <tr>
          <td>{{$product->id}} </td>
          <td>{{$product->iupac}} </td>
          <td>{{$product->cas}} </td>
          <td>{{$product->ce}} </td>
          <td>{{$product->cantidad}}</td>
          <td>{{$product->unit->unidad}}</td>
          <td>{{$product->location->nombre}} </td>
          <td>{{$product->responsable}} </td>
          <td>{{$product->user->nombre}} </td>
          <td>
          {{ HTML::link('product/' . $product->id . '/edit', 'Editar', array('class' => 'btn btn-default btn-sm'))}}
          {{ Form::open(array('url' => 'product/' . $product->id, 'class' => 'pull-right')) }}
          {{ Form::hidden('_method', 'DELETE') }}
          {{ Form::submit('Eliminar', array('class' => 'btn btn-default btn-sm')) }}
          {{ Form::close() }}
          </td>
          <tr><th>Notas</th>
            <td colspan="9">{{$product->notas}} </td>
          </tr>
        </tr>
        @endforeach
    @else
      Todavía no hay nigún Producto registrado
    @endif
    </tbody>
    </table>
    </div>
  @endif
  {{ HTML::link('product/create', 'Crear Producto', array('class' => 'btn btn-lg btn-primary btn-block'))}}
@stop

