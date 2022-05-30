<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNegocioPostproductoPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('negocio_postproducto', function (Blueprint $table) {
            $table->string('negocio_id')->index();
            $table->foreign('negocio_id')->references('patente')->on('negocios')->onDelete('cascade');
            $table->unsignedBigInteger('postproducto_id')->index();
            $table->foreign('postproducto_id')->references('id')->on('postproductos')->onDelete('cascade');
            $table->primary(['negocio_id', 'postproducto_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('negocio_postproducto');
    }
}
