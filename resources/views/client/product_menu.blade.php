@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')

<!-- <div class="visible-print text-center">
    {!! QrCode::size(100)->generate(Request::url()); !!}
</div>

<hr> -->

<!-- <form method="POST" class="form-horizontal" action="#">
    @csrf
    @method('POST') -->

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


    <!-- <button type="submit" class="btn btn-primary">Guardar</button>

</form> -->

@endsection

@section('custom_js')

@endsection
