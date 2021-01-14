@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')

<!-- {{Session::get('user_name')}} -->

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
            <h5 class="modal-title" id="exampleModalLabel">Ingresa tu nombre</h5>
          </div>
          <div class="modal-body">
            <div class="row">
              <fieldset class="form-group col">
                <input type="text" class="form-control" id="txt_user_name" name="">
              </fieldset>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn_add_client_name">Guardar</button>
          </div>
        </div>
      </div>
    </div>


@endsection

@section('custom_js')
<script type="text/javascript">
    //levantar modal
    var user_name = '{{ Session::get('user_name') }}';
    if (user_name == "") {
      $(window).on('load', function() {
          // $('#add_client_name_modal').modal('show');
          $('#add_client_name_modal').modal({
              backdrop: 'static',
              keyboard: false
          });
      });
    }


    //agregar nombre del cliente
    $('#btn_add_client_name').click(function($e){

        var txt_user_name = $("#txt_user_name").val();
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
            },
            error: function (request, error) {
                console.log(arguments);
            }
          });

          $('#add_client_name_modal').modal('hide');
        }

    });
</script>
@endsection
