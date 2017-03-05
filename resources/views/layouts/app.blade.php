<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {!! Html::style('css/jquery-ui.min.css') !!}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
               
                    @if(Auth::check())
                        @if(Auth::user()->tipo_usuario==1)
                        <ul class="nav navbar-nav">
                            <li><a href="{{url('vendedor/index')}}">Vendedor</a></li>
                        </ul>
                        @elseif(Auth::user()->tipo_usuario==2)
                        <ul class="nav navbar-nav">
                            <li><a href="{{url('organizador/index')}}">Organizador</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li><a href="{{url('vendedor/index')}}">Consultar Entradas</a></li>
                        </ul>
                        @elseif(Auth::user()->tipo_usuario==3)
                        <ul class="nav navbar-nav">
                            <li><a href="{{url('portero/index')}}">Portero</a></li>
                        </ul>
                        @endif
                    @endif
                    
                    <ul class="nav navbar-nav navbar-right">
                    
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Iniciar Sesíon</a></li>
                            <li><a href="{{ route('register') }}">Registrarse</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar Sesión
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    {!! Html::script('js/jquery.js') !!}
    <script src="{{ asset('js/app.js') }}"></script>
    {!! Html::script('js/jquery-ui.min.js') !!}
    <script>
        $(function () {
            $(".datepicker").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true,
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
            firstDay: 1,
            monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
            minDate: 0,
            changeYear: true,
            defaultDate: "0d"     
            });
        });
    </script>
</body>
</html>
