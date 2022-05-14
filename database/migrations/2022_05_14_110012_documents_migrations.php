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
        Schema::create('postal_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->string('province')->nullable();
            $table->timestamps();
            //
        });

        Schema::create('types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('locality')->nullable();
            $table->string('comunity')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
            //
        });

        Schema::create('parties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('locality')->nullable();
            $table->string('province')->nullable();
            $table->string('procurator')->nullable();
            $table->timestamps();
            //
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
