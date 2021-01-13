<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Font Awesome - load everything-->
    <script defer src="{{ asset('js/font-awesome/all.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                @if(count(Cart::getContent()))
                <a class="nav-link" href="{{ route('cart.checkout') }}">
                    <i class="fas fa-shopping-cart"></i>
                    [ <span class="badge badge-danger">{{count(Cart::getContent())}}</span> ]
                </a>
                @endif

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('scan.index') }}">
                              <i class="fas fa-qrcode"></i>
                              Lectura QR
                          </a>
                      </li>

                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('cart.index') }}">
                              <i class="fas fa-list-ol"></i>
                              Lista de precios
                          </a>
                      </li>

                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register.index') }}">
                              <i class="fas fa-user-plus"></i>
                              Registrarse
                          </a>
                      </li>

                    </ul>





                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        @if(count(Cart::getContent()))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart.checkout') }}">
                                <i class="fas fa-shopping-cart"></i>
                                [ <span class="badge badge-danger">{{count(Cart::getContent())}}</span> ]
                            </a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart.checkout') }}">
                                <i class="fas fa-shopping-cart"></i>
                                [ 0 ]
                            </a>
                        </li>
                        @endif

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                                </li>
                            @endif
                        @else


                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    @can('administrador')
                                    <a class="nav-link" href="{{ route('parameters.index') }}">
                                        <i class="fas fa-cog fa-fw"></i> Configuracion
                                    </a>
                                    @endcan

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar Sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container">
            @foreach (['danger', 'warning', 'success', 'info'] as $key)
            @if(session()->has($key))
            <div class="alert alert-{{ $key }} alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {!! session()->get($key) !!}
            </div>
            @endif
            @endforeach

            @yield('content')

            <!-- <button class="btn btn-primary hBack mt-auto" type="button" style="position: absolute;bottom:10px;right:10px;">Atrás</button> -->

        </main>
    </div>

    <script src="{{ asset('js/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/popper/popper.min.js') }}" ></script>
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <script>
      $(".hBack").on("click", function(e){
        e.preventDefault();
        window.history.back();
      });
    </script>
    @yield('custom_js')
</body>
</html>
