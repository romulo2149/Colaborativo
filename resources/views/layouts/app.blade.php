<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('public/img/ico.ico')}}" rel="shortcut icon" type="image/x-icon" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/producto.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/css/style.css')}}">  
    <style type="text/css">
	.badge1[data-badge]:after {
		content:attr(data-badge);
		position:absolute;
		top:6px;
		right:2px;
		font-size:.7em;
		background:red;
		color:white;
		width:18px;height:18px;
        line-height:18px;
		text-align:center;
		border-radius:50%;
		box-shadow:0 0 1px #333;
	}
    </style>
</head>
<body>
<div id="app1">
        <nav class="navbar-default navbar-static-top nav">
            <div class="container">                
                <div style="width:500px;" class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <img class="logo" src="{{ asset('img/logo.png')}}" alt="">
                    <a class="navbar-brand" href="{{ url('/inicio') }}">
                        <p class="text-white"><b>{{ config('app.name', 'CloudBucket') }}</b></p>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse" >                       
                    <!-- Left Side Of Navbar -->   
                    <ul class="nav navbar-nav" style="display:inline-block">                                    
                        @guest
                            &nbsp
                            @else
                                    @if(Auth::user()->rol=='Freelancer')
                                    <li><a class="badge1" data-badge="" href="{{route('chat')}}"><p class="text-white"><span class="glyphicon glyphicon-envelope" aria-hidden="true"> </span>&nbsp; Bandeja</p></a></li>
                                    <li><a href="{{ route('buscarProyecto') }}"><p class="text-white"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp; Buscar Proyecto</p></a></li>
                                    <li><a class="badge1" data-badge="" href="{{ route('home') }}"><p class="text-white"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp; Mis Proyectos</p></a></li>
                                    @endif

                                    @if(Auth::user()->rol=='Cliente')
                                    <li><a onclick="vistoMensaje()" id="chatCl" class="" data-badge="" href="{{route('chat')}}"><p class="text-white"><span class="glyphicon glyphicon-envelope" aria-hidden="true"> </span>&nbsp; Bandeja</p></a></li>
                                    <li><a href="{{ route('vistaproyecto') }}"><p class="text-white"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>&nbsp; Subir Proyecto</p></a></li>
                                    <li><a onclick="vistoProyecto()" id="proyCl" class="" data-badge="" href="{{ route('home') }}"><p class="text-white"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp; Mis Proyectos</p></a></li>
                                    @endif

                                    @if(Auth::user()->rol=='Empresa')
                                    <li><a class="badge1" data-badge="" href="{{route('chat')}}"><p class="text-white"><span class="glyphicon glyphicon-envelope" aria-hidden="true"> </span>&nbsp; Bandeja</p></a></li>
                                    <li><a href="{{ route('vistaproyecto') }}"><p class="text-white"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>&nbsp; Subir Proyecto</p></a></li>
                                    <li><a class="badge1" data-badge="" href="{{ route('home') }}"><p class="text-white"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> &nbsp; Mis Proyectos</p></a></li>
                                    @endif
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right" style="display:inline-block">
                        <!-- Authentication Links -->
                        @guest
                            <li style="display: block;"><a href="{{ route('login') }}"><p class="text-white">Iniciar sesión</p></a></li>
                            <li style="display: block;"><a href="{{ route('register') }}"><p class="text-white">Registrarse</p></a></li>
                        @else
                            <li class="dropdown">
                                <a style="color:white" href="#" id="AuthDropDown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('perfil') }}">
                                        <p class="text-white"><span class="glyphicon glyphicon-user"></span> Perfil </p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <p class="text-white">
                                             <span class="glyphicon glyphicon-log-out"></span> Salir </p>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
            @yield('content')

<script>
@auth
function ready(callback){
    // in case the document is already rendered
    if (document.readyState!='loading') callback();
    // modern browsers
    else if (document.addEventListener) document.addEventListener('DOMContentLoaded', callback);
    // IE <= 8
    else document.attachEvent('onreadystatechange', function(){
        if (document.readyState=='complete') callback();
    });
}

ready(function(){
        var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            var json = JSON.parse(this.responseText);
            if(json["mensaje"] > 0)
            {
                document.getElementById("chatCl").setAttribute("class", "badge1");
                document.getElementById("chatCl").setAttribute("data-badge", json["mensaje"]);
            }
            if(json["proyecto"] > 0)
            {
                document.getElementById("proyCl").setAttribute("class", "badge1");
                document.getElementById("proyCl").setAttribute("data-badge", json["proyecto"]);
            }
        }
    };

    request.open('GET', 'api/getNotificaciones/'+{{Auth::user()->id}}, true);
    request.send();
    
    
});
@endauth
</script>
</body>
</html>