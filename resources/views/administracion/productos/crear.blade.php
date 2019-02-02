@extends('administracion.template.template')

@section('content')

<div class="card">
    <div class="card-body">
        <h2 class="card-title text-center">Crear Producto</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <form action="{{ url('Administracion/Productos/Guardar') }}" enctype="multipart/form-data" method="POST">
            
            
            

            <div class="form-group">
                <label for="titulo">T&iacute;tulo</label>
                <input type="text" name="titulo" id="titulo" class="form-control">
            </div>

            <div class="form-group">
                <label for="descripcion">Descripci&oacute;n</label>
                <textarea name="descripcion" id="descripcion" cols="3" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" name="precio" id="precio" class="form-control">
            </div>

            <div class="form-group">
                <label for="f_inicial">Fecha Inicial Descuento</label>
                <input type="date" name="f_inicial" id="f_inicial" class="form-control">
            </div>

            <div class="form-group">
                <label for="f_final">Fecha Final Descuento</label>
                <input type="date" name="f_final" id="f_final" class="form-control">
            </div>

            <div class="form-group">
                <label for="descuento">Valor Descuento</label>
                <input type="number" name="descuento" id="descuento" class="form-control">
            </div>

            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" id="imagen">
            </div>
            
            <div class="btn-submit text-center">
                <input type="submit" value="Guardar" class="btn btn-success mr-2">
            </div>    
            @csrf
        </form>
        
    </div>
</div>
@endsection
