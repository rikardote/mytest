<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('captures', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id')->unsigned();
            $table->bigInteger('incidencia_id')->unsigned();
            $table->bigInteger('qna_id')->unsigned();
            $table->unsignedBigInteger('periodo_id')->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');

            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('incidencia_id')->references('id')->on('incidencias')->onDelete('cascade');
            $table->foreign('qna_id')->references('id')->on('qnas')->onDelete('cascade');
            $table->foreign('periodo_id')->references('id')->on('periodos');
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
        Schema::dropIfExists('captures');
    }
}
