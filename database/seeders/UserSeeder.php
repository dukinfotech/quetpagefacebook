<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('@12345678'),
            'is_active' => true,
            'is_admin' => true,
            'created_at' => now(),
            'access_token' => md5(rand(1, 10) . microtime()),
            'updated_at' => now()
        ]);
    }
}
