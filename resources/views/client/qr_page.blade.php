@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')

<div class="visible-print text-center">
    {!! QrCode::size(100)->generate(Request::url()); !!}
</div>


@endsection

@section('custom_js')

@endsection
