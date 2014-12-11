@extends('master')

@section('content')
  <h1 class="page-header">Gestión y Administración</h1>
    <div class="navbar-default sidebar " role="navigation">
                <div class="col-md-4 navbar-collapse navbar-default">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a name="usuario" id="usuario"  class="active" href="./user"><i class="fa fa-dashboard fa-fw"></i> Usuarios</a>
                        </li>
                        <li>
                            <a id="productos" href="./product"><i class="fa fa-bar-chart-o fa-fw"></i> Productos<span class="fa arrow"></span></a>
                        </li>
                        <li>
                            <a id="grupo" href="./group"><i class="fa fa-table fa-fw"></i> Grupos</a>
                        </li>
                        <li>
                            <a id="localiza" href="./location"><i class="fa fa-edit fa-fw"></i> Localización</a>
                        </li>
                        <li>
                            <a id="tipo" href="./type"><i class="fa fa-wrench fa-fw"></i> Tipo de usuario<span class="fa arrow"></span></a>
                        </li>
                        <li>
                            <a id="unidades" href="./unit"><i class="fa fa-wrench fa-fw"></i> Unidades de medida<span class="fa arrow"></span></a>
                        </li>
                    </ul>
                </div>
   </div>
  

@stop
