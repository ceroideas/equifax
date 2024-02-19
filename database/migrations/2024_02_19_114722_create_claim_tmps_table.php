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
        Schema::create('claim_tmps', function (Blueprint $table) {
            $table->id();

            $table->string('status')->nullable();
            $table->string('claim_type')->nullable();
            $table->foreignid('third_parties_id')->nullable();
            $table->foreignid('debt_tmp_id')->nullable();
            $table->foreignid('debtor_id')->nullable();
            $table->foreignid('user_id')->nullable();
            $table->foreignid('owner_id')->nullable();
            $table->foreignid('agreement_tmp_id')->nullable();
            $table->text('observation')->nullable();
            $table->text('viable_observation')->nullable();

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
        Schema::dropIfExists('claim_tmps');
    }
};
