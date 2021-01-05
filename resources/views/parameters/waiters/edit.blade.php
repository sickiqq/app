@extends('layouts.app')

@section('title', 'Editar Mesero')

@section('content')

<h3 class="mb-3">Editar Mesero</h3>

<form method="POST" class="form-horizontal" action="{{ route('waiters.update', $waiter) }}">
    @csrf
    @method('PUT')

    <div class="row">

        <fieldset class="form-group col">
            <label for="for_name">Nombre</label>
            <input type="text" class="form-control" id="for_name" placeholder="" name="name" required value="{{$waiter->name}}">
        </fieldset>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection

@section('custom_js')

@endsection
