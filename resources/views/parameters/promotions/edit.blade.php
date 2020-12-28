@extends('layouts.app')

@section('title', 'Editar Promoción')

@section('content')

<h3 class="mb-3">Editar Promoción</h3>

<form method="POST" class="form-horizontal" action="{{ route('promotions.update', $promotion) }}">
    @csrf
    @method('PUT')

    <div class="row">

      <fieldset class="form-group col">
          <label for="for_branch_office_id">Sucursal</label>
          <select class="form-control selectpicker" data-live-search="true" name="branch_office_id" required="" data-size="5">
            @foreach ($branchOffices as $key => $branchOffice)
              <option value="{{$branchOffice->id}}" {{ $promotion->branch_office_id == $branchOffice->id ? 'selected' : '' }}>{{$branchOffice->name}}</option>
            @endforeach
          </select>
      </fieldset>

      <fieldset class="form-group col">
          <label for="for_name">Nombre</label>
          <input type="text" class="form-control" id="for_name" placeholder="" name="name" required value="{{$promotion->name}}">
      </fieldset>

    </div>

    <div class="row">

        <fieldset class="form-group col">
            <label for="for_description">Descripción</label>
            <input type="text" class="form-control" id="for_description" placeholder="" name="description" required value="{{$promotion->description}}">
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_price">Precio</label>
            <input type="number" class="form-control" id="for_price" placeholder="" name="price" required value="{{$promotion->price}}">
        </fieldset>

    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

<hr>

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
        @foreach( $promotion->promotionItems as $promotionItem )
        <tr>
            <td>{{ $promotionItem->id }}</td>
            <td>{{ $promotionItem->product->name }}</td>
            <td>{{ $promotionItem->amount }}</td>
            <td>{{ $promotionItem->price }}</td>
            <td>
              <a href="{{ route('promotionItems.edit', $promotionItem) }}"
      					class="btn btn-sm btn-outline-secondary">
      					<span class="fas fa-edit" aria-hidden="true"></span>
      				</a>
      				<form method="POST" action="{{ route('promotionItems.destroy', $promotionItem) }}" class="d-inline">
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
