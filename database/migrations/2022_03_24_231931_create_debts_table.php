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
        Schema::create('debts', function (Blueprint $table) {
            $table->id();
            $table->string('total_amount');
            $table->string('tax');
            $table->string('concept');
            $table->string('document_number');
            $table->date('debt_date');
            $table->date('debt_expiration_date')->nullable();
            $table->string('pending_amount');
            $table->string('partials_amount')->nullable();
            $table->text('additionals');
            $table->string('type');
            $table->string('type_extra')->nullable();
            $table->string('factura');
            $table->string('albaran');
            $table->string('contrato');
            $table->string('documentacion_pedido');
            $table->string('reconocimiento_deuda');
            $table->string('escritura_notarial');
            $table->string('reclamacion_previa')->nullable();
            $table->string('motivo_reclamacion_previa')->nullable();
            $table->string('agreement')->nullable();
            $table->text('others');
            $table->foreignid('debtor_id');
            $table->foreignid('claim_id');
            $table->foreignid('agreement_id');
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
        Schema::dropIfExists('debts');
    }
};
