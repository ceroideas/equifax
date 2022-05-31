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
        Schema::table('third_parties', function(Blueprint $table) {
            //
            $table->string('legal_representative')->nullable();
            $table->string('representative_dni')->nullable();
            $table->string('representative_dni_img')->nullable();
        });

        Schema::table('users', function(Blueprint $table) {
            //
            $table->string('legal_representative')->nullable();
            $table->string('representative_dni')->nullable();
            $table->string('representative_dni_img')->nullable();
            $table->string('apud_acta')->nullable();
            $table->integer('newsletter')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
