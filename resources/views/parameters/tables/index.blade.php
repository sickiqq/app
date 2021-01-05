@extends('layouts.app')

@section('title', 'Listado de Mesas')

@section('content')

@include('parameters.nav')

<h3 class="mb-3">Listado de Mesas</h3>

<a class="btn btn-primary mb-3" href="{{ route('tables.create') }}">
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
        @foreach( $tables as $table )
        <tr>
            <td>{{ $table->id }}</td>
            <td>{{ $table->branchOffice->name }}</td>
            <td>{{ $table->identifier }}</td>
            <td>
      				<a href="{{ route('tables.edit', $table) }}"
      					class="btn btn-sm btn-outline-secondary">
      					<span class="fas fa-edit" aria-hidden="true"></span>
      				</a>
      				<form method="POST" action="{{ route('tables.destroy', $table) }}" class="d-inline">
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
