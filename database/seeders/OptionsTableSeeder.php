<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('options')->insert([
            ['name' => 'zr', 'description' => 'zone-refuge', 'price' => 500],
            ['name' => 'rl', 'description' => 'side-railings', 'price' => 1000],
            ['name' => 'e', 'description' => 'electric', 'price' => 2000],
            ['name' => 'ff', 'description' => 'fork-slider', 'price' => 750],
            ['name' => 'gal', 'description' => 'full-galvanized', 'price' => 3000],
            ['name' => 'tb', 'description' => 'tarpaulin-tunnel', 'price' => 4250],
        ]);
    }
}
