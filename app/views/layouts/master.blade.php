<!DOCTYPE html>
<html>
    <head>
    @section('head')

    @show
        <title>
            @section('title')
            Hotel management system
            @show
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- CSS are placed here -->
        {{ HTML::style('css/bootstrap.css') }}
        <style>
        @section('styles')
            body {
                padding-top: 60px;
            }
        @show
        </style>
    </head>

    <body>
        <!-- Navbar -->
        <div class="navbar navbar-default navbar-fixed-top">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Hotel management system</a>
  </div>
  <div class="navbar-collapse collapse navbar-responsive-collapse">
    <ul class="nav navbar-nav">
      <li><a href={{{ URL::to('') }}}>Home</a></li>

      @if(!Auth::guest())
      <li><a href={{{ URL::to('myhotel') }}}>My hotel</a></li>
            <li><a href={{{ URL::to('staff') }}}>Staff</a></li>
            @if(Authority::can('create','staff')) 
            <li><a href={{{ URL::to('request') }}}>Request</a></li>
            @endif
            <li><a href={{{ URL::to('guest') }}}>Guest</a></li>
        @endif

      <li><a href={{{ URL::to('about') }}}>About</a></li>
      <li class="dropdown">
    </ul>

    <form class="navbar-form navbar-left">
      <input type="text" class="form-control col-lg-8" placeholder="Search">
    </form>
    <ul class="nav navbar-nav navbar-right">
         @if ( Auth::guest())
                            <li>{{ HTML::link('login', 'Login') }}</li>
                        @else
                            <li>{{ HTML::link('logout', 'Logout') }}</li>
                            <li>{{HTML::link('#',Auth::user()->name);}}
                        @endif
    </ul>
  </div>
</div>

        <!-- Container -->
        <div class="container">
            <!-- Success-Messages -->
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Success</h4>
                    {{{ $message }}}
                </div>
            @endif
            <!-- Content -->
            @yield('content')

        </div>
    @section('js')
    {{ HTML::script('js/jquery-1.11.1.min.js')}}
    {{ HTML::script('js/bootstrap.min.js') }}
    @show
    </body>
</html>