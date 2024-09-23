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
        DB::statement('ALTER TABLE users MODIFY name VARCHAR(255)');
        DB::statement('ALTER TABLE users MODIFY email VARCHAR(255)');
        DB::statement('ALTER TABLE users MODIFY dni VARCHAR(255)');
        DB::statement('ALTER TABLE users MODIFY phone VARCHAR(255)');
        DB::statement('ALTER TABLE users MODIFY address VARCHAR(255)');
        DB::statement('ALTER TABLE users MODIFY location VARCHAR(255)');
        DB::statement('ALTER TABLE users MODIFY cop VARCHAR(255)');
        DB::statement('ALTER TABLE users MODIFY iban VARCHAR(255)');
        DB::statement('ALTER TABLE users MODIFY dni_img VARCHAR(255)');
        DB::statement('ALTER TABLE users MODIFY pc_id VARCHAR(255)');
        DB::statement('ALTER TABLE users MODIFY card_token VARCHAR(255)');
        DB::statement('ALTER TABLE users MODIFY card_alias VARCHAR(255)');
        DB::statement('ALTER TABLE users MODIFY legal_representative VARCHAR(255)');
        DB::statement('ALTER TABLE users MODIFY representative_dni VARCHAR(255)');
        DB::statement('ALTER TABLE users MODIFY representative_dni_img VARCHAR(255)');
        DB::statement('ALTER TABLE users MODIFY apud_acta VARCHAR(255)');
        DB::statement('ALTER TABLE users MODIFY taxcode VARCHAR(255)');
        DB::statement('ALTER TABLE users MODIFY province VARCHAR(255)');
        DB::statement('ALTER TABLE users MODIFY discount VARCHAR(255)');
        DB::statement('ALTER TABLE users MODIFY referenced VARCHAR(255)');
        DB::statement('ALTER TABLE users MODIFY campaign VARCHAR(255)');
        DB::statement('ALTER TABLE users MODIFY msgusr VARCHAR(255)');
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
