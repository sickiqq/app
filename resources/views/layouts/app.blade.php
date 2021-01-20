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

                <!-- @if(count(Cart::getContent()))
                <a class="nav-link" href="{{ route('cart.checkout') }}">
                    <label id="lbl_user_name">{{Session::get('user_name')}}</label>
                    <i class="fas fa-shopping-cart"></i>
                    [ <span class="badge badge-danger">{{count(Cart::getContent())}}</span> ]
                </a>
                @endif -->

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

                      <!-- <li class="nav-item">
                          <a class="nav-link" href="{{ route('register.index') }}">
                              <i class="fas fa-user-plus"></i>
                              Registrarse
                          </a>
                      </li> -->

                    </ul>





                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="btn_register_modal">
                              <i class="fas fa-user-plus"></i>
                              Registrarse
                            </a>
                        </li>
                        @if(count(Cart::getContent()))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart.checkout') }}">
                                <label id="lbl_user_name">{{Session::get('user_name')}}</label>
                                <i class="fas fa-shopping-cart"></i>
                                [ <span class="badge badge-danger">{{count(Cart::getContent())}}</span> ]
                            </a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart.checkout') }}">
                                <label id="lbl_user_name">{{Session::get('user_name')}}</label>
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

    <div class="modal fade" id="register_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <!-- <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Registrate!!</h5>
          </div> -->
          <div class="modal-body">

            <!-- <div class="row">
              <fieldset class="form-group col">
                <input type="text" class="form-control" id="txt_email" name="" placeholder="Tu correo electrónico">
              </fieldset>
            </div> -->

            <div class="card bg-light">
            <article class="card-body mx-auto" style="max-width: 400px;">
            	<h4 class="card-title mt-3 text-center">Registrate</h4>
            	<!-- <p class="text-center">Get started with your free account</p> -->
            	<p>
            		<a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Ingresar via Twitter</a>
            		<a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Ingresar via facebook</a>
            	</p>
            	<p class="divider-text">
                    <span class="bg-light">O</span>
                </p>

              <form method="POST" class="form-horizontal" action="{{ route('register.store') }}">
                @csrf
                @method('POST')

            	<div class="form-group input-group">
            		<div class="input-group-prepend">
            		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            		 </div>
                    <input name="name" class="form-control" placeholder="Nombre completo" type="text" value="{{Session::get('user_name')}}">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                	<div class="input-group-prepend">
            		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
            		 </div>
                    <input name="email" class="form-control" placeholder="Correo electrónico" type="email">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                	<div class="input-group-prepend">
            		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
            		</div>
            		<select class="custom-select" style="max-width: 120px;">
            		    <option selected="">+569</option>
            		</select>
                	<input name="phone_number" class="form-control" placeholder="Número de celular" type="text">
                </div> <!-- form-group// -->
                <!-- <div class="form-group input-group">
                	<div class="input-group-prepend">
            		    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
            		</div>
            		<select class="form-control">
            			<option selected=""> Select job type</option>
            			<option>Designer</option>
            			<option>Manager</option>
            			<option>Accaunting</option>
            		</select>
            	</div>-->
                <div class="form-group input-group">
                	<div class="input-group-prepend">
            		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            		</div>
                    <input class="form-control" placeholder="Contraseña" type="password" name="password">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                	<div class="input-group-prepend">
            		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            		</div>
                    <input class="form-control" placeholder="Repite contraseña" type="password" name="confirm_password">
                </div> <!-- form-group// -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Crear tu cuenta  </button>
                </div> <!-- form-group// -->
                <p class="text-center">¿Ya tienes una cuenta? <a href="">Ingresar</a> </p>
            </form>
            </article>
            </div>

          </div>
          <!-- <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn_add_client_name">Guardar</button>
          </div> -->
        </div>
      </div>
    </div>

    <script src="{{ asset('js/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/popper/popper.min.js') }}" ></script>
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <script>
      $(".hBack").on("click", function(e){
        e.preventDefault();
        window.history.back();
      });
      //
      // $('#btn_add_client_name').click(function($e){
      //   $('#myModal').modal('show');
      // }

      $('#btn_register_modal').click(function($e){
        $('#register_modal').modal('show');
      });

    </script>
    @yield('custom_js')
</body>
</html>
