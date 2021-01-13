@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

<h1>Tu solicitud</h1>

<form method="POST" class="form-horizontal" action="{{ route('cart.store') }}">
  @csrf
  @method('POST')

  <table class="table table-striped-sm">
    <thead>
      <tr>
        <!-- <th scope="col">#</th> -->
        <th scope="col">Producto</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio</th>
        <th scope="col">Subtotal</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach(Cart::getContent() as $item)
        <tr>
          <!-- <th scope="row"></th> -->
          <td>{{$item['name']}}</td>
          <td>{{$item['quantity']}}</td>
          <td>${{$item['price']}}</td>
          <td>${{$item['quantity'] * $item['price']}}</td>
          @if($item['associatedModel']->getTable() == "promotions")
            <td><a href="{{ route('cart.remove_promotion_from_cart', $item['associatedModel']) }}"><i class="fas fa-trash-alt"></i></a></td>
          @else
            <td><a href="{{ route('cart.remove_product_from_cart', $item['associatedModel']) }}"><i class="fas fa-trash-alt"></i></a></td>
          @endif
        </tr>
      @endforeach
      <tr>
        <!-- <th scope="row"></th> -->
        <td></td>
        <td></td>
        <td></td>
        <th>${{Cart::getTotal()}}</th>
        <td></td>
      </tr>
    </tbody>
  </table>

  <button type="submit" class="btn btn-primary float-right">Solicitar</button>

</form>

@endsection

@section('custom_js')

@endsection
