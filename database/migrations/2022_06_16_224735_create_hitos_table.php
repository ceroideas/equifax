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
        Schema::create('hitos', function (Blueprint $table) {
            $table->id();
            $table->string('ref_id')->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('phase')->nullable();
            $table->string('name')->nullable();
            $table->string('redirect_to')->nullable();

            $table->integer('template_id')->nullable(); // email
            $table->integer('send_interval')->nullable();
            $table->integer('send_times')->nullable();

            $table->string('type')->nullable();

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
        Schema::dropIfExists('hitos');
    }
};
