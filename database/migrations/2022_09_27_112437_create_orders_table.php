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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('claim_id')->nullable();
            $table->integer('user_id')->nullable(); // gestoria que lo genera
            $table->integer('status')->nullable(); // null por pagar, 1 pagado
            $table->string('amount')->nullable();
            $table->string('type')->nullable(); // fijo o porcentaje
            $table->string('amounts')->nullable();
            $table->string('description')->nullable();
            $table->integer('discount_id')->nullable();
            $table->integer('discount_qty')->nullable();
            $table->string('discount_type')->nullable();
            $table->string('net1ord')->nullable();
            $table->string('net2ord')->nullable();
            $table->string('net3ord')->nullable();
            $table->string('net4ord')->nullable();
            $table->string('pdto1ord')->nullable();
            $table->string('pdto2ord')->nullable();
            $table->string('pdto3ord')->nullable();
            $table->string('pdto4ord')->nullable();
            $table->string('idto1ord')->nullable();
            $table->string('idto2ord')->nullable();
            $table->string('idto3ord')->nullable();
            $table->string('idto4ord')->nullable();
            $table->string('piva1ord')->nullable();
            $table->string('piva2ord')->nullable();
            $table->string('piva3ord')->nullable();
            $table->string('bas1ord')->nullable();
            $table->string('bas2ord')->nullable();
            $table->string('bas3ord')->nullable();
            $table->string('bas4ord')->nullable();
            $table->string('iiva1ord')->nullable();
            $table->string('iiva2ord')->nullable();
            $table->string('iiva3ord')->nullable();
            $table->string('totord')->nullable();
            $table->string('facord')->nullable();  // Facturado o no
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
        Schema::dropIfExists('orders');
    }
};
