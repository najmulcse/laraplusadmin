<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMtypeResponsibilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mtype_responsibility', function (Blueprint $table) {
            $table->unsignedInteger('mtype_id');
            $table->unsignedInteger('responsibility_id');

            $table->foreign('mtype_id')
                ->references('id')
                ->on('mtypes')
                ->onDelete('cascade');

            $table->foreign('responsibility_id')
                ->references('id')
                ->on('responsibilities')
                ->onDelete('cascade');

            $table->primary(['mtype_id', 'responsibility_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mtype_responsibility');
    }
}
