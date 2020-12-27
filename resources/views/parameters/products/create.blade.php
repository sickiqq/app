@extends('layouts.app')

@section('title', 'Nuevo Producto')

@section('content')

<h3 class="mb-3">Nuevo Producto</h3>

<form method="POST" class="form-horizontal" action="{{ route('products.store') }}">
    @csrf
    @method('POST')

    <div class="row">

      <fieldset class="form-group col">
          <label for="for_branch_office_id">Sucursal</label>
          <select class="form-control selectpicker" data-live-search="true" name="branch_office_id" required="" data-size="5">
            @foreach ($branchOffices as $key => $branchOffice)
              <option value="{{$branchOffice->id}}">{{$branchOffice->name}}</option>
            @endforeach
          </select>
      </fieldset>

      <fieldset class="form-group col">
          <label for="for_subcategory_id">Subcategoría</label>
          <select class="form-control selectpicker" data-live-search="true" name="subcategory_id" required="" data-size="5">
            @foreach ($subcategories as $key => $subcategory)
              <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
            @endforeach
          </select>
      </fieldset>

    </div>

    <div class="row">
        <fieldset class="form-group col">
            <label for="for_name">Nombre</label>
            <input type="text" class="form-control" id="for_name" placeholder="" name="name" required>
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_description">Descripción</label>
            <input type="text" class="form-control" id="for_description" placeholder="" name="description" required>
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_price">Precio</label>
            <input type="number" class="form-control" id="for_price" placeholder="" name="price" required>
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_status">Estado</label>
            <select class="form-control selectpicker" data-live-search="true" name="status" required="" data-size="5">
              <option value="1" >Activo</option>
              <option value="0" >Desactivado</option>
            </select>
        </fieldset>

    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection

@section('custom_js')

@endsection
