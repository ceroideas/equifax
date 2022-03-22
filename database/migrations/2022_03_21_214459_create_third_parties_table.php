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
        Schema::create('third_parties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->string('email')->unique();
            $table->string('dni');
            $table->string('phone')->nullable();
            $table->string('address');
            $table->string('location');
            $table->string('cop');
            $table->string('iban')->nullable();
            $table->string('dni_img')->nullable();
            $table->string('poa')->nullable();
            $table->foreignid('user_id');
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
        Schema::dropIfExists('third_parties');
    }
};
