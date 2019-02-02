@extends('administracion.template.template')

@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="card-title">Lista de Productos</h2>
        <div class="text-right">
            <a href="{{ url('Administracion/Productos/Crear') }}" class="btn btn-info btn-fw">Crear</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>TITULO</th>
                        <th>PRECIO</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->titulo }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>                        
                            <a href="{{ url('Administracion/Productos/Hoja_de_producto/'.$producto->id) }}" class="btn btn-icons btn-rounded btn-outline-info" title="Ver">
                                <i class="mdi mdi-star"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection