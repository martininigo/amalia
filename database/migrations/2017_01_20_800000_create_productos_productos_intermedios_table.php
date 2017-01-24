<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosProductosIntermediosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_productos_intermedios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('producto_id');
            $table->integer('producto_intermedio_id');
            $table->decimal('cantidad',10,2);
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('producto_intermedio_id')->references('id')->on('productos_intermedios');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_productos_intermedios');
    }
}
