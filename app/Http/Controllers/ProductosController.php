<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productos;

class ProductosController extends Controller
{
    function __construct(){
        session_start();
    }
    
    function Guardar(Request $request){
        
        
        $validatedData = $request->validate([
            'imagen' => 'required|image',
            'titulo' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'descuento' => 'required',
        ]);

        $producto = new productos;
        $producto->titulo = $request->titulo;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->descuento = $request->descuento;
        $producto->fecha_inicio_descuento = strtotime($request->f_inicial);
        $producto->fecha_fin_descuento = strtotime($request->f_final);
        $result = $producto->save();
        if($result){            
            $adjunto = $request->imagen;
            $extension = $adjunto->getClientOriginalExtension();            
            $path = $this->cargar_adjunto($adjunto, "$producto->id.$extension");            
            $producto->path = $path;
            $producto->save();
        }
     
        return redirect()->back()->with('message', 'Producto Creado!');
    }

    function cargar_adjunto($adjunto, $nombre){
        $path = $adjunto->storeAs(
            'public/productos', $nombre
        );
        return $path;
    }

    function listar(){
        $productos = productos::all();
        return view('administracion/productos/listar')->with("productos", $productos);
    }

    function ver($id){
        $producto = productos::find($id);
        if($producto == false){
            abort(404);
        }
        $producto->path = str_replace("public", "storage", $producto->path);
        return view("administracion/productos/ver")->with("producto", $producto);        
    }

    function stock(){
        $productos = productos::all();        
        $mensaje = (count($productos) > 0) ? false : true;

        return view('administracion/productos/stock')->with("productos", $productos)->with("mensaje", $mensaje);
    }

    function guardarCompra(Request $request){
        
        if(!isset($_SESSION['compras'])){
            $_SESSION['compras'][] = $request->id;
        }else{
            $array_compras = $_SESSION['compras'];
            if(!in_array($request->id, $array_compras)){                
                $_SESSION['compras'][] = $request->id;
                
            }else{        
                return response()->json(["mensaje" => "El producto ya se encuentra adicionado en el carrito"]);
            }
            
        }        
        return response()->json(["mensaje" => "Producto adicionado al carrito correctamente"]);
    }

    function Pagar(){
        $carrito = $_SESSION['compras'];
        $productos = false;
        if(isset($carrito) && count($carrito) > 0){
            $productos = productos::whereIn("id", $carrito)->get();
        }
        return view('administracion/productos/pagar')->with("productos", $productos)->with("total", 0);
    }
}
