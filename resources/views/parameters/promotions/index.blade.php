@extends('layouts.app')

@section('title', 'Listado de Promociones')

@section('content')

<h3 class="mb-3">Listado de Promociones</h3>

<a class="btn btn-primary mb-3" href="{{ route('promotions.create') }}">
    <i class="fas fa-plus"></i> Agregar nueva
</a>

<table class="table table-sm table-borderer">
    <thead>
        <tr>
            <th>Id</th>
            <th>Sucursal</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Valor</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach( $promotions as $promotion )
        <tr>
            <td>{{ $promotion->id }}</td>
            <td>{{ $promotion->branchOffice->name }}</td>
            <td>{{ $promotion->name }}</td>
            <td>{{ $promotion->description }}</td>
            <td>{{ $promotion->price }}</td>
            <td>
      				<a href="{{ route('promotions.edit', $promotion) }}"
      					class="btn btn-sm btn-outline-secondary">
      					<span class="fas fa-edit" aria-hidden="true"></span>
      				</a>
      				<form method="POST" action="{{ route('promotions.destroy', $promotion) }}" class="d-inline">
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
