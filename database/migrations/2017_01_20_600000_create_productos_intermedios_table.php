<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosIntermediosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_intermedios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre',100)->unique();
            $table->mediumText('descripcion',500);
            $table->decimal('cantidad',10,2);
            $table->integer('unidad_id');
            $table->foreign('unidad_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_intermedios');
    }
}
