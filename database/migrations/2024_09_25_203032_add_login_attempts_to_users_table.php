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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('login_attempts')->default(0); // Para los intentos de login fallidos
            $table->timestamp('account_locked_at')->nullable(); // Fecha de bloqueo
            $table->boolean('force_password_change')->default(false); // Si se fuerza un cambio de contraseña
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['login_attempts', 'account_locked_at', 'force_password_change']);
        });
    }
};
