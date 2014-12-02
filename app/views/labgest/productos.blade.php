@extends('master')

	@section('content')
    <h1>PRODUCTOS</h1>
    {{Form::open(array('action' => 'ProductController@search'))}}
        {{Form::text('keyword', null, array('placeholder'=>'Término de Búsqueda'))}}
        {{Form::submit('Buscar')}}
    {{Form::close()}}

    @if(isset($results))
        <h1>RESULTADOS DE BÚSQUEDA</h1>
        <h2>Se han encontrado {{$resultsCount}} productos</h2>
        <ul>
            @foreach($results as $result)
                <li>{{$result->id}} </li>
                <li>{{$result->cas}} </li>
                <li>{{$result->iupac}} </li>
                <li>{{$result->ce}} </li>
                <li>{{$result->cantidad}} {{$result->unit->unidad}} </li>
                <li>{{$result->location->nombre}} </li>
                <li>{{$result->responsable}} </li>
                <li>{{$result->user_id}} </li>
                <li>{{$result->notas}} </li>
                @if(!Auth::guest())
                	{{ HTML::link('product/' . $result->id, 'Mostrar Producto' ) }}
                	{{ HTML::link('product/' . $result->id . '/edit', 'Editar Producto')}}
                	{{ Form::open(array('url' => 'product/' . $result->id, 'class' => 'pull-right')) }}
                	{{ Form::hidden('_method', 'DELETE') }}
                	{{ Form::submit('Eliminar Producto', array('class' => 'btn btn-warning')) }}
                	{{ Form::close() }}
                @endif
                <br/>
            @endforeach
        </ul>
    @endif

    @if(!Auth::guest())
        {{ HTML::link('product', 'Gestionar Productos') }}
    @endif    
	@stop
