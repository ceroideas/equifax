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
        Schema::create('linvoices', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id')->nullable();
            $table->integer('poslin')->nullable();
            $table->string('artlin')->nullable();
            $table->string('deslin')->nullable();
            $table->integer('canlin')->nullable();
            $table->string('dtolin')->nullable();
            $table->string('ivalin')->nullable();
            $table->string('prelin')->nullable();
            $table->string('totlin')->nullable();
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
        Schema::dropIfExists('linvoices');
    }
};
