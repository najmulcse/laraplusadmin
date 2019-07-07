<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeResponsibilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_responsibility', function (Blueprint $table) {
            $table->unsignedInteger('employee_id');
            $table->unsignedInteger('responsibility_id');

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onDelete('cascade');
            $table->foreign('responsibility_id')
                ->references('id')
                ->on('responsibilities')
                ->onDelete('cascade');

            $table->primary(['employee_id', 'responsibility_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_responsibility');
    }
}
