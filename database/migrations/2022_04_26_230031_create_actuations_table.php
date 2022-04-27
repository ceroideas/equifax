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
        Schema::create('actuations', function (Blueprint $table) {
            $table->id();
            $table->integer('claim_id')->nullable();
            $table->integer('invoice_id')->nullable();
            $table->string('subject')->nullable();
            $table->text('description')->nullable();
            $table->string('amount')->nullable();
            $table->string('actuation_date')->nullable();
            $table->integer('type')->nullable(); // 1 success 2 fail
            $table->integer('mailable')->nullable(); // enviar mail al cliente
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
        Schema::dropIfExists('actuations');
    }
};
