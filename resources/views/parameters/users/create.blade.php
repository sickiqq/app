@extends('layouts.app')

@section('title', 'Nuevo Usuario')

@section('content')

@include('parameters.nav')

<h3 class="mb-3">Nuevo Usuario</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" class="form-horizontal" action="{{ route('users.store') }}">
    @csrf
    @method('POST')
    <div class="card mb-3">
        <div class="card-body">
            <div class="form-row">

                <fieldset class="form-group col-12 col-md-3">
                    <label for="for_name">Nombre y Apellido *</label>
                    <input type="text" class="form-control" name="name" id="for_name"
                        required autocomplete="off">
                </fieldset>

                <fieldset class="form-group col-12 col-md-3">
                    <label for="for_email">Email *</label>
                    <input type="email" class="form-control" name="email" id="for_email"
                        style="text-transform: lowercase;"
                        required autocomplete="off">
                </fieldset>

                <fieldset class="form-group col-12 col-md-2">
                    <label for="for_password">Clave *</label>
                    <input type="password" class="form-control" name="password" id="for_password"
                        autocomplete="off" required>
                </fieldset>
            </div>
      </div>
  </div>

    @foreach($permissions as $permission)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="permissions[]"
            value="{{ $permission->name }}">
        <label class="form-check-label">
            {{ $permission->name }}
        </label>
    </div>
    @endforeach

    <button type="submit" class="btn btn-primary mt-3">Guardar</button>


</form>



@endsection

@section('custom_js')

@endsection
