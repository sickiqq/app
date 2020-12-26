@extends('layouts.app')

@section('title', 'Editar Fecha de corte')

@section('content')

<h3 class="mb-3">Editar Categoría</h3>

<form method="POST" class="form-horizontal" action="{{ route('categories.update', $category) }}">
    @csrf
    @method('PUT')

    <div class="row">

        <fieldset class="form-group col">
            <label for="for_name">Nombre</label>
            <input type="text" class="form-control" id="for_name" placeholder="" name="name" required value="{{$category->name}}">
        </fieldset>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection

@section('custom_js')

@endsection
