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

    @foreach($products_array as $key1 => $categories)
      <h2>{{$key1}}</h2><hr>
      @foreach($categories as $key2 => $subcategories)
        <h3>&nbsp;&nbsp;&nbsp;{{$key2}}</h3>


        <table class="table table-sm">
          <tbody>
            @foreach($subcategories as $key3 => $product)
              <tr>
                <th style="width: 20%"></th>
                <th>{{$key3}}</th>
                <td style="width: 20%">{{$product->price}}</td>
                <td><i class="fas fa-plus"></i></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @endforeach
    @endforeach

    <!-- <button type="submit" class="btn btn-primary">Guardar</button>

</form> -->

@endsection

@section('custom_js')

@endsection
