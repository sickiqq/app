@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')

<!-- {{Session::get('user_name')}} -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/register.css') }}">

    <div class="row">

        <fieldset class="form-group col">
            <label for="for_name">Compañía</label>
            <input type="text" class="form-control" id="for_name" readonly="readonly" value="{{$table->branchOffice->company->name}}">
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_name">Sucursal</label>
            <input type="text" class="form-control" id="for_name" readonly="readonly" value="{{$table->branchOffice->name}}">
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_name">Mesa</label>
            <input type="text" class="form-control" id="for_name" readonly="readonly" value="{{$table->identifier}}">
        </fieldset>

    </div>

    <hr>

    <h1>Carta de precios</h1>

    <table class="table table-sm table-striped">
      <tbody>
    @foreach($products_array as $key1 => $categories)
      <tr class="table-dark">
        <td colspan="4"><center><h4>{{$key1}}</h4></center></td>
      </tr>
      <tr>
        <th style="width: 30%"></th>
        <td style="width: 40%"></td>
        <td style="width: 20%"></td>
        <td></td>
      </tr>
      <!-- <h2>{{$key1}}</h2><hr> -->
      @foreach($categories as $key2 => $subcategories)
        <!-- <h3>&nbsp;&nbsp;&nbsp;{{$key2}}</h3> -->
        <tr>
          <td style="width: 30%">&nbsp;&nbsp;&nbsp;{{$key2}}</td>
          <td style="width: 40%"></td>
          <td style="width: 20%"></td>
          <td></td>
        </tr>
            @foreach($subcategories as $key3 => $product)
              <tr>
                <th style="width: 30%"></th>
                <td style="width: 40%"><b>{{$key3}}</b><br>{{$product->description}}</td>
                <td style="width: 20%">${{$product->price}}</td>
                <td> <a href="{{ route('cart.add_product_to_cart', $product) }}"><i class="fas fa-plus"></i></a></td>
              </tr>
            @endforeach
      @endforeach
    @endforeach
      </tbody>
    </table>

    <table class="table table-sm table-striped">
      <tbody>
        <tr class="table-dark">
          <td colspan="4"><center><h4>Promociones</h4></center></td>
        </tr>
        @foreach($promotions as $key3 => $promotion)
          <tr>
            <th style="width: 30%"></th>
            <td style="width: 40%"><b>{{$promotion->name}}</b><br>{{$promotion->description}}</td>
            <td style="width: 20%">${{$promotion->price}}</td>
            <td> <a href="{{ route('cart.add_promotion_to_cart', $promotion) }}"><i class="fas fa-plus"></i></a></td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <!-- modal -->
    <div class="modal fade" id="add_client_name_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Identificate!</h5>
          </div>
          <div class="modal-body">

            <!-- <div class="row">
              <fieldset class="form-group col">
                <input type="text" class="form-control" id="txt_user_name" name="" placeholder="Tu nombre">
              </fieldset>
            </div> -->

            <div class="card bg-light">
            <article class="card-body ">
            	<!-- <h4 class="card-title mt-3 text-center">Registrate</h4> -->
            	<!-- <p class="text-center">Get started with your free account</p> -->
            	<p>
            		<!-- <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Ingresar via Twitter</a>
            		<a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Ingresar via facebook</a> -->
                <div class="fb-login-button" data-width="" data-size="medium" data-button-type="continue_with" data-layout="default" data-onlogin="add_facebook_client_name" data-auto-logout-link="false" data-use-continue-as="true"></div>
              </p>
            	<p class="divider-text">
                    <span class="bg-light">O</span>
                </p>

          	  <div class="form-group input-group">
            		 <div class="input-group-prepend">
            		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            		 </div>
                 <input name="name" class="form-control" id="txt_user_name" placeholder="Tu nombre" type="text" value="{{Session::get('user_name')}}">
              </div> <!-- form-group// -->

              <div class="form-group">
                  <button type="submit" id="btn_add_client_name" class="btn btn-primary btn-block"> Ingresar </button>
              </div>
              <p class="text-center">¿Ya tienes una cuenta? <a href="">Ingresar</a> </p>

            </article>
            </div>

          </div>
          <!-- <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn_add_client_name">Guardar</button>
          </div> -->
        </div>
      </div>
    </div>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v9.0" nonce="aIXIeqc2"></script>
    <div id="status"></div>

@endsection

@section('custom_js')
<script type="text/javascript">
    //levantar modal
    var user_name = '{{ Session::get('user_name') }}';
    if (user_name == "") {
      $(window).on('load', function() {
          // $('#add_client_name_modal').modal('show');
          // $("#txt_user_name").focus();
          $('#add_client_name_modal').modal({
              backdrop: 'static',
              keyboard: false
          });
      });
    }


    //agregar nombre del cliente
    $('#btn_add_client_name').click(function($e){

        var txt_user_name = $("#txt_user_name").val();
        // var txt_user_name = $("#txt_email").val();
        if (txt_user_name == "") {

        }else {
          $.ajax({
            url:"{{ route('cart.add_client_name') }}",
            type:"post",
            data:{user_name:txt_user_name},
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success:function(results){
              // alert("success");
              $("#lbl_user_name").text(txt_user_name);
            },
            error: function (request, error) {
                console.log(arguments);
            }
          });

          $('#add_client_name_modal').modal('hide');
        }

    });

    window.fbAsyncInit = function() {
      FB.init({
        appId            : '1204230399974385',
        autoLogAppEvents : true,
        xfbml            : true,
        version          : 'v9.0'
      });

      FB.AppEvents.logPageView();

      FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            // Logged into your app and Facebook.
            FB.api('/me', function (response) {
                console.log(response);
            });
        } else {
            // The person is not logged into your app or we are unable to tell.
            document.getElementById('status').innerHTML = 'Please log ' + 'into this app.';
        }
      });

      // FB.login(function(response) {

      // }, {scope: 'email,user_likes'});

    };

    function add_facebook_client_name(){
          $.ajax({
            url:"{{ route('cart.add_facebook_client_name') }}",
            type:"post",
            data:{user_name:response.name,facebook_id:response.id},
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success:function(results){
              // alert("success");
              $("#lbl_user_name").text(response.name);
              $('#add_client_name_modal').modal('hide');
            },
            error: function (request, error) {
                console.log(arguments);
            }
          });
    }

    (function(d, s, id){
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.id = id;
       js.src = "https://connect.facebook.net/en_US/sdk.js";
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));


</script>
@endsection
