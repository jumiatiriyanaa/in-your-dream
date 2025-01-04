<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('packages')->insert([
            [
                'id' => 1,
                'name' => 'Selfphoto/Photobox',
                'price' => 60000.00,
                'desc' => 'Test',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'Wedding',
                'price' => 1800000.00,
                'desc' => 'Test',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => 'Wisuda',
                'price' => 100000.00,
                'desc' => 'Test',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'name' => 'Ulang Tahun',
                'price' => 100000.00,
                'desc' => 'Test',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'name' => 'Prewedding',
                'price' => 100000.00,
                'desc' => 'Test',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'name' => 'Tunangan',
                'price' => 100000.00,
                'desc' => 'Test',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'name' => 'Akikah',
                'price' => 100000.00,
                'desc' => 'Test',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'name' => 'Event Lainnya',
                'price' => 100000.00,
                'desc' => 'Test',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
