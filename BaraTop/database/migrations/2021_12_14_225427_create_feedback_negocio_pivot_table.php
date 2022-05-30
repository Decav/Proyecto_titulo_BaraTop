<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeedbackNegocioPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_negocio', function (Blueprint $table) {
            $table->unsignedBigInteger('feedback_id')->index();
            $table->foreign('feedback_id')->references('id')->on('feedbacks')->onDelete('cascade');
            $table->string('negocio_id')->index();
            $table->foreign('negocio_id')->references('patente')->on('negocios')->onDelete('cascade');
            $table->primary(['feedback_id', 'negocio_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback_negocio');
    }
}
