<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insumos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100)->unique();
            $table->mediumText('descripcion',500);
            $table->integer('unidad_id');
            $table->decimal('cantidad',10,2);
            $table->decimal('precio');
            $table->timestamps();
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
        Schema::dropIfExists('insumos');
    }
}
