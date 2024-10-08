<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('amount')->nullable();
            $table->integer('claim_id')->nullable();
            $table->integer('gestor_id')->nullable();
            $table->timestamps();
            //
        });

        Schema::table('claims', function(Blueprint $table) {
            //
            $table->integer('gestor_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts');
    }
};
