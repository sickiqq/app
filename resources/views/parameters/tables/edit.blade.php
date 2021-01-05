@extends('layouts.app')

@section('title', 'Editar Mesa')

@section('content')

<link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css"/>

<h3 class="mb-3">Editar Mesa</h3>

<form method="POST" class="form-horizontal" action="{{ route('tables.update', $table) }}">
    @csrf
    @method('PUT')

    <div class="row">

        <fieldset class="form-group col">
            <label for="for_activity_name">Sucursal</label>
            <select class="form-control selectpicker" data-live-search="true" name="category_id" required="" data-size="5">
              @foreach ($branchOffices as $key => $branchOffice)
                <option value="{{$branchOffice->id}}" {{ $table->branchOffice->id == $branchOffice->id ? 'selected' : '' }}>{{$branchOffice->name}}</option>
              @endforeach
            </select>
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_name">Nombre</label>
            <input type="text" class="form-control" id="for_name" placeholder="" name="identifier" required value="{{$table->identifier}}">
        </fieldset>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection

@section('custom_js')
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

@endsection
