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
        Schema::create('debt_tmps', function (Blueprint $table) {
            $table->id();
            $table->string('total_amount')->nullable();
            $table->string('tax')->nullable();
            $table->string('concept')->nullable();
            $table->string('document_number')->nullable();
            $table->timestamp('debt_date')->nullable();
            $table->timestamp('debt_expiration_date')->nullable();
            $table->string('pending_amount')->nullable();
            $table->string('partials_amount')->nullable();
            $table->text('additionals')->nullable();
            $table->string('type')->nullable();
            $table->string('type_extra')->nullable();
            $table->integer('reclamacion_previa_indicar')->nullable();
            $table->string('fecha_reclamacion_previa')->nullable(); // documento que acredite dicha reclamacion
            $table->text('partials_amount_details')->nullable(); // detalle de pagos y fechas de los pagos
            $table->string('reclamacion_previa')->nullable();
            $table->string('motivo_reclamacion_previa')->nullable();
            $table->string('agreement')->nullable();
            $table->text('others')->nullable();
            $table->foreignid('debtor_id');
            $table->foreignid('claim_tmp_id')->nullable();
            $table->foreignid('agreement_tmp_id')->nullable();

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
        Schema::dropIfExists('debt_tmps');
    }
};
