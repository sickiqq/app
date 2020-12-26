@extends('layouts.app')

@section('title', 'Nueva Fecha de corte')

@section('content')

<h3 class="mb-3">Nueva Fecha de corte</h3>

<form method="POST" class="form-horizontal" action="{{ route('categories.store') }}">
    @csrf
    @method('POST')

    <div class="row">

        <fieldset class="form-group col">
            <label for="for_name">Nombre</label>
            <input type="text" class="form-control" id="for_name" placeholder="" name="name" required>
        </fieldset>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection

@section('custom_js')

@endsection
