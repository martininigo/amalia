<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosInsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_insumos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('producto_id');
            $table->integer('insumo_id');
            $table->decimal('cantidad',10,2);
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('insumo_id')->references('id')->on('insumos');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_insumos');
    }
}
