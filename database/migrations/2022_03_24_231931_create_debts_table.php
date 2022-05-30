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

            $table->text('additionals')->nullable();
            $table->string('type')->nullable();
            $table->string('type_extra')->nullable();
            
            // 
            
            /*$table->string('factura')->nullable();
            $table->string('albaran')->nullable();
            $table->string('contrato')->nullable();
            $table->string('documentacion_pedido')->nullable();
            $table->string('extracto')->nullable();
            $table->string('reconocimiento_deuda')->nullable();
            $table->string('escritura_notarial')->nullable();*/

            //

            $table->integer('reclamacion_previa_indicar')->nullable();
            $table->string('fecha_reclamacion_previa')->nullable(); // documento que acredite dicha reclamacion

            $table->text('partials_amount_details')->nullable(); // detalle de pagos y fechas de los pagos
            
            $table->string('reclamacion_previa')->nullable();
            $table->string('motivo_reclamacion_previa')->nullable();

            //

            $table->string('agreement')->nullable();
            $table->text('others')->nullable();
            $table->foreignid('debtor_id');
            $table->foreignid('claim_id')->nullable();
            $table->foreignid('agreement_id')->nullable();
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
