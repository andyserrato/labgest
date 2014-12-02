@extends('master')

@section('content')
  <h1 class="page-header">GESTIÓN Y ADMINISTRACIÓN</h1>
  <div class="btn-group-vertical" role="group" aria-label="administracion">
     {{ HTML::link('user', 'Usuarios', array('class' => 'btn btn-lg btn-primary btn-block')) }}
     {{ HTML::link('product', 'Productos', array('class' => 'btn btn-lg btn-primary btn-block')) }}
     {{ HTML::link('group', 'Grupos', array('class' => 'btn btn-lg btn-primary btn-block')) }}
     {{ HTML::link('location', 'Localización', array('class' => 'btn btn-lg btn-primary btn-block')) }}
     {{ HTML::link('type', 'Tipo de Usuario', array('class' => 'btn btn-lg btn-primary btn-block')) }}
     {{ HTML::link('unit', 'Unidades de medida', array('class' => 'btn btn-lg btn-primary btn-block')) }}
  </div>
@stop
