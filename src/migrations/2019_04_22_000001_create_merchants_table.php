<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mtype_id')->unsigned();
            $table->string('name');
            $table->string('website')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('designation')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('alternative_contact_no')->nullable();
            $table->string('email')->nullable();
            $table->string('logo')->nullable();
            $table->string('founded_date')->nullable();
            $table->string('about')->nullable();
            $table->string('referral_mobile_no')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->integer('active_status')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('mtype_id')
                ->references('id')
                ->on('mtypes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchants');
    }
}
