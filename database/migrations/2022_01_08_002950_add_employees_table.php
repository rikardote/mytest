<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('num_empleado')->unique();
            $table->string('name');
            $table->string('first_lastname');
            $table->string('second_lastname');
            $table->date('fecha_ingreso');
            $table->bigInteger('department_id')->unsigned()->index()->nullable();
            $table->bigInteger('schedule_id')->unsigned()->index()->nullable();
            $table->bigInteger('condition_id')->unsigned()->index()->nullable();
            $table->bigInteger('job_id')->unsigned()->index()->nullable();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('schedule_id')->references('id')->on('schedules');
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->foreign('condition_id')->references('id')->on('conditions');
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
        Schema::dropIfExists('employees');
    }
}
