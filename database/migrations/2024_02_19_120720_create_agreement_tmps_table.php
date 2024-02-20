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
        Schema::create('agreements_tmps', function (Blueprint $table) {
            $table->id();

            $table->string('take');
            $table->string('wait');
            $table->text('observation');
            $table->foreignid('debt_tmp_id')->nullable();
            $table->foreignid('debtor_id')->nullable();
            $table->foreignid('claim_tmp_id')->nullable();
            $table->foreignid('user_id')->nullable();

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
        Schema::dropIfExists('agreements');
    }
};
