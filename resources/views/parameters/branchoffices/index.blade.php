@extends('layouts.app')

@section('title', 'Listado de Sucursales')

@section('content')

@include('parameters.nav')

<h3 class="mb-3">Listado de Sucursales</h3>

<a class="btn btn-primary mb-3" href="{{ route('branchoffices.create') }}">
    <i class="fas fa-plus"></i> Agregar nueva
</a>

<table class="table table-sm table-borderer">
    <thead>
        <tr>
            <th>Id</th>
            <th>Categoría</th>
            <th>Nombre</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach( $branchOffices as $branchOffice )
        <tr>
            <td>{{ $branchOffice->id }}</td>
            <td>{{ $branchOffice->company->name }}</td>
            <td>{{ $branchOffice->name }}</td>
            <td>
      				<a href="{{ route('branchoffices.edit', $branchOffice) }}"
      					class="btn btn-sm btn-outline-secondary">
      					<span class="fas fa-edit" aria-hidden="true"></span>
      				</a>
      				<form method="POST" action="{{ route('branchoffices.destroy', $branchOffice) }}" class="d-inline">
      					@csrf
      					@method('DELETE')
      					<button type="submit" class="btn btn-outline-secondary btn-sm" onclick="return confirm('¿Está seguro de eliminar la información?');">
      						<span class="fas fa-trash-alt" aria-hidden="true"></span>
      					</button>
      				</form>
      			</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

@section('custom_js')

@endsection
