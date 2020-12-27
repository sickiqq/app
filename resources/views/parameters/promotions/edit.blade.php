@extends('layouts.app')

@section('title', 'Editar Promoción')

@section('content')

<h3 class="mb-3">Editar Promoción</h3>

<form method="POST" class="form-horizontal" action="{{ route('promotions.update', $promotion) }}">
    @csrf
    @method('PUT')

    <div class="row">

      <fieldset class="form-group col">
          <label for="for_branch_office_id">Sucursal</label>
          <select class="form-control selectpicker" data-live-search="true" name="branch_office_id" required="" data-size="5">
            @foreach ($branchOffices as $key => $branchOffice)
              <option value="{{$branchOffice->id}}" {{ $promotion->branch_office_id == $branchOffice->id ? 'selected' : '' }}>{{$branchOffice->name}}</option>
            @endforeach
          </select>
      </fieldset>

      <fieldset class="form-group col">
          <label for="for_name">Nombre</label>
          <input type="text" class="form-control" id="for_name" placeholder="" name="name" required value="{{$promotion->name}}">
      </fieldset>

    </div>

    <div class="row">

        <fieldset class="form-group col">
            <label for="for_description">Descripción</label>
            <input type="text" class="form-control" id="for_description" placeholder="" name="description" required value="{{$promotion->description}}">
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_price">Precio</label>
            <input type="number" class="form-control" id="for_price" placeholder="" name="price" required value="{{$promotion->price}}">
        </fieldset>

    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection

@section('custom_js')

@endsection
