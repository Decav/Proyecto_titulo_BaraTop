<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEtiquetaProductoPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etiqueta_producto', function (Blueprint $table) {
            $table->unsignedBigInteger('etiqueta_id')->index();
            $table->foreign('etiqueta_id')->references('id')->on('etiquetas')->onDelete('cascade');
            $table->unsignedBigInteger('producto_id')->index();
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->primary(['etiqueta_id', 'producto_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etiqueta_producto');
    }
}
