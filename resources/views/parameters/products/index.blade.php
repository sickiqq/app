@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')

@include('parameters.nav')

<h3 class="mb-3">Listado de Products</h3>

<a class="btn btn-primary mb-3" href="{{ route('products.create') }}">
    <i class="fas fa-plus"></i> Agregar nuevo
</a>

<table class="table table-sm table-borderer">
    <thead>
        <tr>
            <th>Id</th>
            <th>Sucursal</th>
            <th>Subcategoría</th>
            <th>Nombre</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach( $products as $product )
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->branchOffice->name }}</td>
            <td>{{ $product->subcategory->name }}</td>
            <td>{{ $product->name }}</td>
            <td>
      				<a href="{{ route('products.edit', $product) }}"
      					class="btn btn-sm btn-outline-secondary">
      					<span class="fas fa-edit" aria-hidden="true"></span>
      				</a>
      				<form method="POST" action="{{ route('products.destroy', $product) }}" class="d-inline">
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
