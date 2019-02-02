@extends('administracion.template.template')

@section('content')
    <div class="row">
    @foreach($productos as $producto)
        @php
            $producto->path = str_replace("public", "storage", $producto->path);
        @endphp
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ $producto->titulo }}</h2>
                    <div class="text-center">
                        <img src="{{ asset($producto->path) }}" alt="" style="max-width: 100%">
                    </div>
                    
                    <div class="text-center">
                        <p style="margin-top: 10px"><strong>Descripción: </strong> {{ $producto->descripcion }}</p>
                        
                        @if(!is_null($producto->fecha_inicio_descuento) && !is_null($producto->fecha_fin_descuento))
                            @if(strtotime("now") >= $producto->fecha_inicio_descuento && strtotime("now") <= $producto->fecha_fin_descuento)
                                <p><strong>Valor: </strong>{{ number_format(round($producto->precio - $producto->descuento, 0), 0, ",", ".") }}</p>
                            @else
                                <p><strong>Valor: </strong>{{ number_format($producto->precio, 0, ",", ".") }}</p>
                            @endif
                        @endif
                    </div>                
                    <div class="text-center">
                        <button type="button" class="btn btn-outline-success btn-fw addCart" data-val="{{ $producto->id }}">
                          <i class="fa fa-shopping-cart"></i> Comprar</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    
    @if($mensaje)
    <div class="alert alert-info">
        No hay productos, por favor adicione algunos
    </div>
    @endif
    </div>
    <input type="hidden" name="url_base" value="{{ url('/') }}">
    @csrf
@endsection