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
            $table->string('extra_code')->nullable();
            $table->string('extra_concept')->nullable();
            $table->string('judicial_amount_code')->nullable();
            $table->string('judicial_amount_concept')->nullable();
            $table->string('judicial_fees_code')->nullable();
            $table->string('judicial_fees_concept')->nullable();
            $table->string('verbal_amount_code')->nullable();
            $table->string('verbal_amount_concept')->nullable();
            $table->string('verbal_fees_code')->nullable();
            $table->string('verbal_fees_concept')->nullable();
            $table->string('ordinary_amount_code')->nullable();
            $table->string('ordinary_amount_concept')->nullable();
            $table->string('ordinay_fees_code')->nullable();
            $table->string('ordinary_fees_concept')->nullable();
            $table->string('execution_code')->nullable();
            $table->string('excecution_concept')->nullable();
            $table->string('resource_code')->nullable();
            $table->string('resource_concept')->nullable();
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
