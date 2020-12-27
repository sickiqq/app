@extends('layouts.app')

@section('title', 'Editar Subcategoría')

@section('content')

<link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css"/>

<h3 class="mb-3">Editar Subcategoría</h3>

<form method="POST" class="form-horizontal" action="{{ route('subcategories.update', $subcategory) }}">
    @csrf
    @method('PUT')

    <div class="row">

        <fieldset class="form-group col">
            <label for="for_activity_name">Categoría</label>
            <select class="form-control selectpicker" data-live-search="true" name="category_id" required="" data-size="5">
              @foreach ($categories as $key => $category)
                <option value="{{$category->id}}" {{ $subcategory->category_id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
              @endforeach
            </select>
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_name">Nombre</label>
            <input type="text" class="form-control" id="for_name" placeholder="" name="name" required value="{{$subcategory->name}}">
        </fieldset>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection

@section('custom_js')
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

@endsection
