@extends('layouts.app')

@section('title', 'Nueva Sucursal')

@section('content')

<h3 class="mb-3">Nueva Sucursal</h3>

<form method="POST" class="form-horizontal" action="{{ route('branchoffices.store') }}">
    @csrf
    @method('POST')

    <div class="row">

        <fieldset class="form-group col">
          <label for="for_activity_name">Empresa</label>
          <select name="company_id" id="company_id" class="form-control">
            <option value="">--</option>
            @foreach ($companies as $key => $company)
            <option value="{{$company->id}}">{{$company->name}}</option>
            @endforeach
          </select>
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_name">Nombre</label>
            <input type="text" class="form-control" id="for_name" placeholder="" name="name" required>
        </fieldset>
    </div>

    <div class="row">

      <fieldset class="form-group col">
          <label for="for_name">País</label>
          <select class="form-control selectpicker" data-live-search="true" name="country" required="" data-size="5" >
              <option value="Chile">Chile</option>
          </select>
      </fieldset>

      <fieldset class="form-group col">
          <label for="for_name">Ciudad</label>
          <select class="form-control selectpicker" data-live-search="true" name="city" required="" data-size="5" >
              <option value="Iquique">Iquique</option>
          </select>
      </fieldset>

      <fieldset class="form-group col">
          <label for="for_address">Dirección</label>
          <input type="text" class="form-control" id="for_address" placeholder="" name="address" required >
      </fieldset>

    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection

@section('custom_js')

@endsection
