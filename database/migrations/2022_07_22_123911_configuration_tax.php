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
        Schema::table('configurations', function(Blueprint $table) {
            $table->string('fixed_fees_tax')->nullable();
            $table->string('judicial_amount_tax')->nullable();
            $table->string('judicial_fees_tax')->nullable();
            $table->string('verbal_amount_tax')->nullable();
            $table->string('verbal_fees_tax')->nullable();
            $table->string('ordinary_amount_tax')->nullable();
            $table->string('ordinary_fees_tax')->nullable();
            $table->string('execution_tax')->nullable();
            $table->string('resource_tax')->nullable();
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
