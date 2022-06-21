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
        Schema::create('configurations', function(Blueprint $table) {
            //
            $table->increments('id');
            $table->string('fixed_fees')->nullable();
            $table->string('percentage_fees')->nullable();
            $table->string('judicial_amount')->nullable();
            $table->string('judicial_fees')->nullable();
            $table->string('verbal_amount')->nullable();
            $table->string('verbal_fees')->nullable();
            $table->string('ordinary_amount')->nullable();
            $table->string('ordinary_fees')->nullable();
            $table->string('execution')->nullable();
            $table->string('resource')->nullable();
            $table->string('tax')->nullable();
            $table->string('invoice_name')->nullable();
            $table->string('invoice_address_line_1')->nullable();
            $table->string('invoice_address_line_2')->nullable();
            $table->string('invoice_email')->nullable();

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
        Schema::dropIfExists('configurations');
    }
};
