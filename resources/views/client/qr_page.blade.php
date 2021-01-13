@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')

<div class="row">
  <fieldset class="form-group col">
    <div class="visible-print text-center">
        {!! QrCode::size(100)->generate(route('scan.read_qr',['table_id'=>1])); !!}
    </div>
  </fieldset>

  <fieldset class="form-group col">
    <div class="visible-print text-center">
        {!! QrCode::size(100)->generate(route('scan.read_qr',['table_id'=>2])); !!}
    </div>
  </fieldset>

  <fieldset class="form-group col">
    <div class="visible-print text-center">
        {!! QrCode::size(100)->generate(route('scan.read_qr',['table_id'=>5])); !!}
    </div>
  </fieldset>

  <fieldset class="form-group col">
    <div class="visible-print text-center">
        {!! QrCode::size(100)->generate(route('scan.read_qr',['table_id'=>10])); !!}
    </div>
  </fieldset>
</div>


@endsection

@section('custom_js')

@endsection
