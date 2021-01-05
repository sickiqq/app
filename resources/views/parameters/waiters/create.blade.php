@extends('layouts.app')

@section('title', 'Nuevo Mesero')

@section('content')

<h3 class="mb-3">Nuevo Mesero</h3>

<form method="POST" class="form-horizontal" action="{{ route('waiters.store') }}">
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
