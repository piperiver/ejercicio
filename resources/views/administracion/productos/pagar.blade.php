@extends('administracion.template.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
    @foreach($productos as $producto)
        @php
            $producto->path = str_replace("public", "storage", $producto->path);
        @endphp
        
            <tr>
                <td>
                    <img src="{{ asset($producto->path) }}" alt="" style="width: 100px;height: auto;">
                </td>
                <td>
                    <h4>{{ $producto->titulo }}</h4>
                    @if(!is_null($producto->fecha_inicio_descuento) && !is_null($producto->fecha_fin_descuento))
                        @if(strtotime("now") >= $producto->fecha_inicio_descuento && strtotime("now") <= $producto->fecha_fin_descuento)
                                @php
                                    $producto->precio = round($producto->precio - $producto->descuento, 0);
                                @endphp                                
                            @endif
                    @endif
                    <p><strong>Valor: </strong>{{ number_format($producto->precio, 0, ",", ".") }}</p>                    
                </td>
            </tr>
            @php
                $total += $producto->precio
            @endphp
    @endforeach
        </table>        
        <div class="text-rigth">
            <h1>Total: {{ number_format($total, 0, ",", ".") }}</h1>
        </div>
    </div>
</div>    
@endsection