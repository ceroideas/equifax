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
        Schema::table('invoices', function(Blueprint $table) {
            /* Datos clientes */
            $table->string('cnofac')->nullable();
            $table->string('cdofac')->nullable();
            $table->string('cpofac')->nullable();
            $table->string('ccpfac')->nullable();
            $table->string('cprfac')->nullable();
            $table->string('cnifac')->nullable();
            /* Headers facturas */
            $table->string('net1fac')->nullable();
            $table->string('net2fac')->nullable();
            $table->string('net3fac')->nullable();
            $table->string('net4fac')->nullable();

            $table->string('pdto1fac')->nullable();
            $table->string('pdto2fac')->nullable();
            $table->string('pdto3fac')->nullable();
            $table->string('pdto4fac')->nullable();

            $table->string('idto1fac')->nullable();
            $table->string('idto2fac')->nullable();
            $table->string('idto3fac')->nullable();
            $table->string('idto4fac')->nullable();

            $table->string('piva1fac')->nullable();
            $table->string('piva2fac')->nullable();
            $table->string('piva3fac')->nullable();

            $table->string('bas1fac')->nullable();
            $table->string('bas2fac')->nullable();
            $table->string('bas3fac')->nullable();
            $table->string('bas4fac')->nullable();

            $table->string('iiva1fac')->nullable();
            $table->string('iiva2fac')->nullable();
            $table->string('iiva3fac')->nullable();

            $table->string('totfac')->nullable();

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
