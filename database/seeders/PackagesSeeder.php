<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
                'price' => 17000.00,
                'desc' => 'Test',
                'created_at' => Carbon::create('2024', '11', '26', '13', '06', '25'),
                'updated_at' => Carbon::create('2024', '11', '26', '13', '06', '25'),
            ],
            [
                'id' => 2,
                'name' => 'Wedding',
                'price' => 50000.00,
                'desc' => 'Test',
                'created_at' => Carbon::create('2024', '11', '26', '13', '06', '58'),
                'updated_at' => Carbon::create('2024', '11', '26', '13', '06', '58'),
            ],
            [
                'id' => 3,
                'name' => 'Marriage Proposal / Aqiqah',
                'price' => 50000.00,
                'desc' => 'Test',
                'created_at' => Carbon::create('2024', '11', '26', '13', '07', '24'),
                'updated_at' => Carbon::create('2024', '11', '26', '13', '07', '24'),
            ],
        ]);
    }
}
