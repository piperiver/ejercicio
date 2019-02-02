<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('titulo', 255);
            $table->text('descripcion');
            $table->integer('precio');
            $table->integer('fecha_inicio_descuento')->nullable();
            $table->integer('fecha_fin_descuento')->nullable();
            $table->integer('descuento'); 
            $table->string('path', 255)->nullable();           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
