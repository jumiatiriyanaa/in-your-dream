<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('backgrounds')->insert([
            [
                'name' => 'Green Photobox',
                'image_path' => 'img/green.png',
                'description' => 'Background Gratis',
                'is_free' => true,
            ],
            [
                'name' => 'Red Photobox',
                'image_path' => 'img/red.png',
                'description' => 'Background Gratis',
                'is_free' => true,
            ],
            [
                'name' => 'Abstract 1',
                'image_path' => 'img/abstract1.jpg',
                'description' => 'Background Gratis',
                'is_free' => true,
            ],
            [
                'name' => 'Abstract 2',
                'image_path' => 'img/abstract2.jpg',
                'description' => 'Background Gratis',
                'is_free' => true,
            ],
        ]);
    }
}
