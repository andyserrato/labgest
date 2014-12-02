<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>LabGest</title>
    {{ HTML::style('assets/css/bootstrap.css') }}
    {{ HTML::style('assets/css/bootstrap-theme.css') }}
  </head>
  <body role="document">
  <!-- Navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{{ URL::to('/') }}}">LABGEST</a>
            </div>
            <!-- Everything you want hidden at 940px or less, place within here -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{URL::to('introduccion')}}">Introducción</a></li>
                    <li><a href="{{URL::to('product')}}">Productos</a></li>
                    <li><a href="{{URL::to('riskquim')}}">RiskQuim</a></li>
                    @if(Auth::check())
                      <li><a href="{{URL::to('administracion')}}">Administración</a></li>
                      <li><a href="{{URL::to('user/' . Auth::user()->id . '/edit')}}"> Logged in as {{Auth::user()->nombre}}</a></li>
                      <li><a href="{{URL::to('logout')}}">Log out</a></li>
                    @else
                      <li><a href="{{URL::to('login')}}">Log in</a></li>
                    @endif                
                </ul> 
            </div>
            
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

        {{ HTML::script('assets/js/bootstrap.min.js') }}
  </body>
</html>
