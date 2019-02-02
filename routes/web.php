<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Administracion/Inicio', function () {
    return view('administracion/inicio');
});

Route::get('/Administracion/Productos/Crear', function () {
    return view('administracion/productos/crear');
});

Route::post("/Administracion/Productos/Guardar", "ProductosController@Guardar");
Route::get("/Administracion/Productos/", "ProductosController@listar");
Route::get("/Administracion/Productos/Hoja_de_producto/{id}", "ProductosController@ver");

Route::get("Stock/", "ProductosController@stock");
Route::get("Pagar/", "ProductosController@Pagar");
Route::post("addCart/", "ProductosController@guardarCompra");