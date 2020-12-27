@extends('layouts.app')

@section('title', 'Nueva Subcategoría')

@section('content')

<h3 class="mb-3">Nueva Subcategoría</h3>

<form method="POST" class="form-horizontal" action="{{ route('subcategories.store') }}">
    @csrf
    @method('POST')

    <div class="row">

        <fieldset class="form-group col">
          <label for="for_activity_name">Categoría</label>
          <select name="category_id" id="category_id" class="form-control">
            <option value="">--</option>
            @foreach ($categories as $key => $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
        </fieldset>

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
