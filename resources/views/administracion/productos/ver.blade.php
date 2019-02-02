@extends('administracion.template.template')

@section('content')

<div class="card">
    <div class="card-body text-center">
        <h2 class="card-title text-center">{{ $producto->titulo }}</h2>
        <div class="content-image text-center">
            <img src="{{ asset($producto->path) }}" alt="" srcset="">
        </div>
        <p><strong>Descripción: </strong> {{ $producto->descripcion }}</p>
        <p><strong>Precio: </strong> {{ number_format($producto->precio, 0, ",", ".") }}</p>
        @if(!is_null($producto->fecha_inicio_descuento) && !is_null($producto->fecha_fin_descuento))
            <p><strong>Fecha inicio descuento: </strong> {{ date("d-m-Y", $producto->fecha_inicio_descuento) }}</p>
            <p><strong>Fecha fin descuento: </strong> {{ date("d-m-Y", $producto->fecha_fin_descuento) }}</p>
        @endif
        <p><strong>Descuento: </strong>{{ number_format($producto->descuento, 0, ",", ".") }}</p>
        
    </div>
</div>
@endsection