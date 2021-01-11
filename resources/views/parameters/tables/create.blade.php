@extends('layouts.app')

@section('title', 'Nueva Mesa')

@section('content')

<h3 class="mb-3">Nueva Mesa</h3>

<form method="POST" class="form-horizontal" action="{{ route('tables.store') }}">
    @csrf
    @method('POST')

    <div class="row">

        <fieldset class="form-group col">
          <label for="for_branch_office_id">Categoría</label>
          <select name="branch_office_id" id="branch_office_id" class="form-control">
            <option value="">--</option>
            @foreach ($branchOffices as $key => $branchOffice)
            <option value="{{$branchOffice->id}}">{{$branchOffice->name}}</option>
            @endforeach
          </select>
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_identifier">Identificador</label>
            <input type="text" class="form-control" id="for_identifier" placeholder="" name="identifier" required>
        </fieldset>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection

@section('custom_js')

@endsection
