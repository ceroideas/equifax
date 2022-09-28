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
        Schema::create('lorders', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->nullable();
            $table->integer('poslor')->nullable();
            $table->string('artlor')->nullable();
            $table->string('deslor')->nullable();
            $table->integer('canlor')->nullable();
            $table->string('dtolor')->nullable();
            $table->string('ivalor')->nullable();
            $table->string('prelor')->nullable();
            $table->string('totlor')->nullable();
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
        Schema::dropIfExists('lorders');
    }
};
