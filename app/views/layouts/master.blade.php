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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="HandheldFriendly" content="true" />
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

    <div class="navbar navbar-default navbar-fixed-top container-fluid">
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
    <?php $user=User::find(Auth::id()); ?>
    <li><a href={{{ URL::to('hotel') }}}>Hotel</a></li>
    @if($user->role == 'manager')
    <li><a href={{{ URL::to('room') }}}>Room</a></li>
    <li><a href={{{ URL::to('guest') }}}>Guest</a></li>
    <li><a href={{{ URL::to('staff') }}}>Staff</a></li>
    <li><a href={{{ URL::to('request') }}}>Request</a></li>
    @elseif($user->role == 'staff')
    <li><a href={{{ URL::to('staff') }}}>Staff</a></li>
    @if($user->permissions->view_guest==1)
    <li><a href={{{ URL::to('guest') }}}>Guest</a></li>
    @endif
    @if($user->permissions->view_room==1)
    <li><a href={{{ URL::to('room') }}}>Room</a></li>
    @endif
    @endif
    @endif
    <li class="dropdown">
    </ul>

    <ul class="nav navbar-nav navbar-right">
    @if ( Auth::guest())
    <li>{{ HTML::link('login', 'Login') }}</li>
    @else
    <li>{{ HTML::link('logout', 'Logout') }}</li>
    <li>{{HTML::link('edit_user',Auth::user()->name);}}
    @endif
    </ul>
    </div>
    </div>

    <!-- Container -->
    <div class="container">
    <!-- Success-Messages -->
    @if ($message = Session::get('success'))
    <div class="alert alert-dismissable alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>Success</h4>
    {{{ $message }}}
    </div>
    @endif
    <!-- Fail-Messages -->
    @if ($message = Session::get('fail'))
    <div class="alert alert-dismissable alert-danger">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>Error</h4>
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