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
        Schema::table('users', function(Blueprint $table) {
            //
            $table->integer('type')->nullable();
        });

        Schema::table('invoices', function(Blueprint $table) {
            //
            $table->string('amounts')->nullable();
            $table->string('description')->nullable();
            $table->integer('discount_id')->nullable(); // por si se hace una tabla de cupones
            $table->integer('discount_qty')->nullable(); // por si se hace fijo
            $table->string('discount_type')->nullable(); // por si se hace fijo
        });

        Schema::table('claims', function(Blueprint $table) {
            //
            $table->string('apud_acta')->nullable();
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
