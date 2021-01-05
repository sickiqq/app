@extends('layouts.app')

@section('title', 'Editar Sucursal')

@section('content')

<link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css"/>

<h3 class="mb-3">Editar Sucursal</h3>

<form method="POST" class="form-horizontal" action="{{ route('branchoffices.update', $branchoffice) }}">
    @csrf
    @method('PUT')

    <div class="row">

        <fieldset class="form-group col">
            <label for="for_activity_name">Categoría</label>
            <select class="form-control selectpicker" data-live-search="true" name="company_id" required="" data-size="5">
              @foreach ($companies as $key => $company)
                <option value="{{$company->id}}" {{ $branchoffice->company_id == $company->id ? 'selected' : '' }}>{{$company->name}}</option>
              @endforeach
            </select>
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_name">Nombre</label>
            <input type="text" class="form-control" id="for_name" placeholder="" name="name" required value="{{$branchoffice->name}}">
        </fieldset>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection

@section('custom_js')
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

@endsection
