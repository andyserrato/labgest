@extends('master')

@section('content')

   <!-- <button type="button" class="btn btn-danger">Danger</button>-->
	<!--<img border=0 src="assets/images/Logo.png"></img>-->
    <div class="jumbotron">
        <h1> Bienvenido a LABGEST!</h1>
        <p class="lead">Gestiona tu laboratorio, ten localizados los productos químicos, mantén una gestión de qué usuarios son responsables de los productos y que cantidad tienen del mismo.</p>
       </div>
    <div class="col-md-12">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-leaf fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                	
                                    <div class="huge">0<!--Sacar cuenta de productos total --></div>
                                    
                                    <div>Productos</div>
                                </div>
                            </div>
                        </div>
                        <a href="#primero">
                            <div class="panel-footer">
                                <span class="pull-left">Ver detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">0</div>
                                    <div>Usuarios</div>
                                </div>
                            </div>
                        </div>
                        <a href="#segundo">
                            <div class="panel-footer">
                                <span class="pull-left">Ver detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-location-arrow fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">0</div>
                                    <div>Localizaciones</div>
                                </div>
                            </div>
                        </div>
                        <a href="#tercero">
                            <div class="panel-footer">
                                <span class="pull-left">Ver detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-area-chart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">0</div>
                                    <div>Medidas</div>
                                </div>
                            </div>
                        </div>
                        <a href="#cuarto">
                            <div class="panel-footer">
                                <span class="pull-left">Ver detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <A name="arriba"></A>

<A name="primero"><H1><i class="fa fa-leaf"> Productos</i></H1></A>
	<p>LABGEST le permite una búsqueda eficiente de un producto químico en cuestión.
	 Para realizar esa búsqueda se le proporciona 3 modos de búsqueda:
				<ul>
				  <li>Nº CAS</li>
				  <li>Nº CE</li>
				  <li>Nº IUPAC</li>
				</ul>
Cada producto vendrá detallado con esta serie de conceptos:
				<ul>
				  <li>#: ID del producto</li>
				  <li>Nº IUAPC</li>
				  <li>Nº CAS</li>
				  <li>Nº CE </li>
				  <li>Cantidad</li>
				  <li>Unidad</li>
				  <li>Ubicación</li>
				  <li>Responsable</li>
				  <li>Modificado</li>
				  <li>Notas</li>
				</ul>
Si usted tiene privilegios, podrá crear, editar, eliminar y visualizar todos los productos de LABGEST.

	</p>

 <div class="panel panel-green " style="border: none; "> <A name="segundo"><H1><i class="fa fa-users"> Usuarios</i></H1></A></div>

<p>LABGEST le permite registrar a multitud de usuarios, dando 4 niveles de distinción entre ellos.
				<ul>
				  <li>Invitado</li>
				  <li>Trabajador</li>
				  <li>Responsable</li>
				  <li>Admin</li>
				</ul>
Cada usuario vendrá detallado con esta serie de conceptos:
				<ul>
				  <li>Nombre</li>
				  <li>Email</li>
				  <li>Contraseña</li>
				  <li>Teléfono</li>
				  <li>Tipo de usuario</li>
				  <li>Grupo al que pertenece</li>
				</ul>
Si usted tiene privilegios, podrá crear, editar, eliminar y visualizar todos los usuarios de LABGEST.
	</p>

<div class="panel panel-yellow " style="border: none; "><A name="tercero"><H1><i class="fa fa-location-arrow"> Localización</i></H1></A></div>

<p>LABGEST le permite registrar a multitud de localizaciones, dando así una visión detallada de donde se encuentra cada producto en el instante de su uso.
Si usted tiene privilegios, podrá crear, editar, eliminar y visualizar todas las lozalizaciones de LABGEST.
	</p>

<div class="panel panel-red" style="border: none; "><A name="cuarto"><H1><i class="fa fa-area-chart"> Medidas</i></H1></A></div>

<p>LABGEST le permite registrar a multitud de tipos de medidas, dando así una visión detallada de la cantidad que cada producto tiene y de que tipo se trata.
Si usted tiene privilegios, podrá crear, editar, eliminar y visualizar todas las medidas de LABGEST.
	</p>

        </div>

@stop
