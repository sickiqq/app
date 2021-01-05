@extends('layouts.app')

@section('title', 'Listado de Meseros')

@section('content')

@include('parameters.nav')

<h3 class="mb-3">Listado de Meseros</h3>

<a class="btn btn-primary mb-3" href="{{ route('waiters.create') }}">
    <i class="fas fa-plus"></i> Agregar nuevo
</a>

<table class="table table-sm table-borderer">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach( $waiters as $waiter )
        <tr>
            <td>{{ $waiter->id }}</td>
            <td>{{ $waiter->name }}</td>
            <td>
      				<a href="{{ route('waiters.edit', $waiter) }}"
      					class="btn btn-sm btn-outline-secondary">
      					<span class="fas fa-edit" aria-hidden="true"></span>
      				</a>
      				<form method="POST" action="{{ route('waiters.destroy', $waiter) }}" class="d-inline">
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
