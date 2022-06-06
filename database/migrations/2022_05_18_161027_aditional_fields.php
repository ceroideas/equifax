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
        Schema::table('third_parties', function(Blueprint $table) {
            //
            $table->string('legal_representative')->nullable();
            $table->string('representative_dni')->nullable();
            $table->string('representative_dni_img')->nullable();
        });

        Schema::table('users', function(Blueprint $table) {
            //
            $table->string('legal_representative')->nullable();
            $table->string('representative_dni')->nullable();
            $table->string('representative_dni_img')->nullable();
            $table->string('apud_acta')->nullable();
            $table->integer('newsletter')->nullable();
        });

        Schema::table('claims', function(Blueprint $table) {
            //
            $table->string('phase')->nullable();
        });
        Schema::table('actuations', function(Blueprint $table) {
            //
            $table->integer('hito_padre')->nullable();
        });

        Schema::create('debt_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('debt_id')->nullable();
            $table->string('document')->nullable();
            $table->string('type')->nullable();
            $table->text('hitos')->nullable();
            $table->timestamps();
            //
        });

        Schema::table('debts', function(Blueprint $table) {
            //
            $table->integer('reclamacion_previa_indicar')->nullable();
            $table->string('fecha_reclamacion_previa')->nullable(); // documento que acredite dicha reclamacion

            $table->text('partials_amount_details')->nullable(); // detalle de pagos y fechas de los pagos
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
