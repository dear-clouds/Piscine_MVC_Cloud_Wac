<!DOCTYPE html>
<html>
<head>
    <title>
        @section('title')
        @show
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>



    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/bootstrap-theme.css') }}
    {{ HTML::style('css/basic.css') }}

    {{ HTML::script('js/bootstrap.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/dropzone.js') }}

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
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>

    <a href="{{{ URL::to('') }}}" class="navbar-brand">Cloud Wac</a>
    </div>

    <div class="collapse navbar-collapse">
    <ul class="nav navbar-nav">
    @if (Auth::guest())
    <li>{{ HTML::link('login', 'Connexion') }}</li>
    <li>{{ HTML::link('register', 'Inscription') }}</li>


    @else 
    <li>{{ HTML::link('profile', 'Profil') }}</li> 
    <li>{{ HTML::link('contact', 'Contact') }}</li> 
    </ul> 


    <div class="navbar-right">
    <ul class="nav navbar-nav">
    
    <li>{{ HTML::link('admin', 'Administration') }}</li>
    <li>{{ HTML::link('logout', 'Se déconnecter') }}</li>
    </ul>
    </div>
    @endif

    
    </div>
    </div>
    </div> 

    <div class="container">

    <!-- Tous les messages d'informations/errors/success -->
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{{ $message }}}
    </div>

    @endif


    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{{ $message }}}
    </div>

    @endif

    @if ($message = Session::get('info'))
    <div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{{ $message }}}
    </div>

    @endif

    @yield('content')

    </div>

    <!-- Scripts -->
    {{ HTML::script('js/bootstrap.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}



    </body>
    </html>