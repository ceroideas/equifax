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
            $table->string('fixed_fees_dto')->nullable();
            $table->string('judicial_amount_dto')->nullable();
            $table->string('verbal_amount_dto')->nullable();
            $table->string('ordinary_amount_dto')->nullable();
            $table->string('execution_dto')->nullable();
            $table->string('resource_dto')->nullable();
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
