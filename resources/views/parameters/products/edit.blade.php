@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')

<h3 class="mb-3">Editar Producto</h3>

<form method="POST" class="form-horizontal" action="{{ route('products.update', $product) }}">
    @csrf
    @method('PUT')

    <div class="row">

      <fieldset class="form-group col">
          <label for="for_branch_office_id">Sucursal</label>
          <select class="form-control selectpicker" data-live-search="true" name="branch_office_id" required="" data-size="5">
            @foreach ($branchOffices as $key => $branchOffice)
              <option value="{{$branchOffice->id}}" {{ $product->branch_office_id == $branchOffice->id ? 'selected' : '' }}>{{$branchOffice->name}}</option>
            @endforeach
          </select>
      </fieldset>

      <fieldset class="form-group col">
          <label for="for_subcategory_id">Subcategoría</label>
          <select class="form-control selectpicker" data-live-search="true" name="subcategory_id" required="" data-size="5">
            @foreach ($subcategories as $key => $subcategory)
              <option value="{{$subcategory->id}}" {{ $product->subcategory_id == $subcategory->id ? 'selected' : '' }}>{{$subcategory->name}}</option>
            @endforeach
          </select>
      </fieldset>

    </div>

    <div class="row">
        <fieldset class="form-group col">
            <label for="for_name">Nombre</label>
            <input type="text" class="form-control" id="for_name" placeholder="" name="name" required value="{{$product->name}}">
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_description">Descripción</label>
            <input type="text" class="form-control" id="for_description" placeholder="" name="description" required value="{{$product->description}}">
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_price">Precio</label>
            <input type="number" class="form-control" id="for_price" placeholder="" name="price" required value="{{$product->price}}">
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_status">Estado</label>
            <select class="form-control selectpicker" data-live-search="true" name="status" required="" data-size="5">
              <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Activo</option>
              <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Desactivado</option>
            </select>
        </fieldset>

    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection

@section('custom_js')

@endsection
