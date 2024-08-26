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
            ['name' => 'rl1200', 'description' => 'side-railings', 'price' => 1000], // pour tous les modèles sauf otc
            ['name' => 'rl1200p', 'description' => 'side-railings-prime-xs', 'price' => 500], // pour tous les modèles sauf otc
            ['name' => 'rl350', 'description' => 'side-railings-350', 'price' => 500], // pour bigfoot
            ['name' => 'le', 'description' => 'electric-lift', 'price' => 2000],
            ['name' => 'be', 'description' => 'electric-crutches', 'price' => 3500],
            ['name' => 'ff', 'description' => 'fork-slider', 'price' => 750],
            ['name' => 'ffd', 'description' => 'double-fork-slider', 'price' => 1500],
            ['name' => 'tt', 'description' => 'traction-drawbar', 'price' => 750],
            ['name' => 'gan', 'description' => 'full-galvanized', 'price' => 3000], // galva normale
            ['name' => 'gap', 'description' => 'full-galvanized-prime', 'price' => 1500], // galva prime
            ['name' => 'gab', 'description' => 'full-galvanized-bigfoot', 'price' => 5700], // galva big-foot
            ['name' => 'gao', 'description' => 'full-galvanized-otc', 'price' => 3500], // galva otc
            ['name' => 'tb', 'description' => 'tarpaulin-tunnel', 'price' => 4250],
        ]);
    }
}
