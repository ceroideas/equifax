<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' =>'superadmin@dividae.com',
            'role' => 0,
            'password' => Hash::make('dividae'),
        ]);

        DB::table('users')->insert([
            'name' => 'Administrador Dev',
            'email' =>'devadmin@dividae.com',
            'role' => 1,
            'password' => Hash::make('dividae'),
        ]);

        \App\Models\User::factory(10)->create();
    }
}
