<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Bimo Nugraha',
            'email' => 'bimonugraha@gmail.com',
            'email_verified_at' => null,
            'phone_number' => null,
            'address' => null,
            'password' => Hash::make('bimbimoo'),
            'remember_token' => null,
            'avatar' => null,
            'login_type' => 'manual',
            'level' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
