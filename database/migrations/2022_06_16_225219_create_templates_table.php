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
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('top_logo')->nullable();
            $table->text('top_content')->nullable();
            $table->text('header_content')->nullable();
            $table->string('header_image')->nullable();
            $table->text('body_content')->nullable();
            $table->text('footer_content')->nullable();
            $table->string('cta_button')->nullable();
            $table->string('cta_button_link')->nullable();
            $table->text('signature')->nullable();
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
        Schema::dropIfExists('templates');
    }
};
