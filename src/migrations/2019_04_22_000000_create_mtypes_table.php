<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMtypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mtypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
           // $table->string('responsibility_id');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('active_status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mtypes');
    }
}
