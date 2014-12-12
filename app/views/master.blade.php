<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>LabGest</title>
    <!-- favicon -->
    <link rel="apple-touch-icon" href="assets/images/favicon.ico">
    <link rel="icon" href="assets/images/favicon.ico">


    <!--{ HTML::style('assets/css/bootstrap.css') }}-->
    {{ HTML::style('assets/css/bootstrap-theme.css') }}
    {{ HTML::style('assets/css/bootstrap.min.css') }}

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="assets/css/metisMenu/metisMenu.min.css" rel="stylesheet">

    

    <!-- Custom CSS -->
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="assets/css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!--<script src="assets/js/libCapas.js" > </script>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>-->


    <!-- Script para cargar la parte de administracion en una capa -->
      <!--<script type="text/javascript">
      $(document).ready(function() {
        $("#usua").close();

        $("#usuario").click(function(event) {
          $("#capa").load('./user');
        });
        $("#productos").click(function(event) {
          $("#capa").load('./product');
        });
        $("#grupo").click(function(event) {
          $("#capa").load('./group');
        });
        $("#localiza").click(function(event) {
          $("#capa").load('./location');
        });
        $("#tipo").click(function(event) {
          $("#capa").load('./type');
        });
        $("#unidades").click(function(event) {
          $("#capa").load('./unit');
        });

      });
    </script>-->
        
  </head>
  <body role="document">
      <div class="container" style="padding-top: 1em;">
        <nav class="navbar navbar-default" role="navigation">
          <!-- El logotipo y el icono que despliega el menú se agrupan
               para mostrarlos mejor en los dispositivos móviles -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Desplegar navegación</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{{ URL::to('/') }}}">LABGEST</a>
          </div>
        
          <!-- Agrupar los enlaces de navegación, los formularios y cualquier
               otro elemento que se pueda ocultar al minimizar la barra -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
            @if(Auth::check())
            <ul class="nav navbar-nav">
              <!--<li><a  href="{{URL::to('product')}}">Productos</a></li>-->
              <li role="presentation" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          Productos<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="{{URL::to('product/create')}}">Nuevo producto</a></li>
                          <li><a href="{{URL::to('mostrar')}}">Todos los productos</a></li>
                          <li class="divider"></li>
                      <li><a href="{{URL::to('product')}}">Gestionar productos</a></li>
                      </ul>
              </li>
              <li role="presentation" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          Usuarios<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="{{URL::to('user/create')}}">Nuevo usuario</a></li>
                          <li class="divider"></li>
                      <li><a href="{{URL::to('user')}}">Gestionar usuarios</a></li>
                      </ul>
              </li>
              <li role="presentation" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          Localizaciones<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="{{URL::to('location/create')}}">Nueva localización</a></li>
                          <li class="divider"></li>
                      <li><a href="{{URL::to('location')}}">Gestionar localizaciones</a></li>
                      </ul>
              </li>
              <li role="presentation" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          Tipos de usuario<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="{{URL::to('type/create')}}">Nuevo tipo de usuario</a></li>
                          <li class="divider"></li>
                      <li><a href="{{URL::to('type')}}">Gestionar tipos de usuario</a></li>
                      </ul>
              </li>
              <li role="presentation" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          Tipos de medida<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="{{URL::to('unit/create')}}">Nuevo tipo de medida</a></li>
                          <li class="divider"></li>
                      <li><a href="{{URL::to('unit')}}">Gestionar tipos de medida</a></li>
                      </ul>
              </li>



            </ul>
                      
            <ul class="nav navbar-nav navbar-right">
                    <li role="presentation"><a href="{{URL::to('riskquim')}}">RiskQuim</a></li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {{Auth::user()->nombre}} <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu">

                        <li><a href="{{URL::to('user/' . Auth::user()->id . '/edit')}}">Mi perfil</a></li>
                        <li class="divider"></li>
                      <li><a href="{{URL::to('logout')}}">Cerrar sesión</a></li>
                      </ul>
                    </li>
            </ul>
                @else
                <ul class="nav navbar-nav">
                  <li><a  href="{{URL::to('product')}}">Productos</a></li>
                                      </ul>
                <ul class="nav navbar-nav navbar-right">
                      <li><a href="{{URL::to('riskquim')}}" >RiskQuim</a></li>
                      <li><a href="{{URL::to('login')}}">Entrar</a></li>
                </ul>
                @endif    
            
          </div>
        </nav>
              <div class="container theme-showcase" role="main"> 
            @if(Session::has('message'))
              <div class="container"> 
              <div class="alert alert-success">
                {{Session::remove('message')}}
              </div>
              </div>

            @endif
            <div class="container"> 
              @yield('content')
            </div>
      </div>
    </div>
    
    <footer class="text-center" style="padding-top:40px;padding-bottom:40px;margin-top:100px;color:#777;text-align:center;border-top:1px solid #e5e5e5" role="contentinfo">GroupDinamizadores© Copyright 2014 </footer>
  
        {{ HTML::script('assets/js/jquery.min.js') }}
        {{ HTML::script('assets/js/bootstrap.min.js') }}
        
      </body>
</html>
