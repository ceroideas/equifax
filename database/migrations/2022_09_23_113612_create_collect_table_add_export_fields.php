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
        Schema::create('collect', function (Blueprint $table) {
            $table->id();
            $table->timestamp('feccob')->nullable();
            $table->string('impcob');
            $table->string('cptcob');
            $table->string('cpacob');
            $table->string('obscob')->nullable();
            $table->string('tracob')->nullable();
            $table->timestamps();
        });

        Schema::table('invoices', function(Blueprint $table) {
            $table->string('trafac')->nullable()->default(0);
            $table->string('tipfac')->nullable()->default(0);
        });

        Schema::table('linvoices', function(Blueprint $table) {
            $table->string('dcolfa')->nullable()->default(0);
        });

        Schema::table('claims', function(Blueprint $table) {
            $table->string('tracla')->nullable()->default(0);
        });

        Schema::table('actuations', function(Blueprint $table) {
            $table->string('traact')->nullable()->default(0);
        });

        Schema::table('configurations', function(Blueprint $table) {
            $table->string('deposit_concept');
            $table->string('deposit_code');
            $table->string('deposit_tax');
            $table->string('deposit_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collect_and_export_fields');
    }
};
