<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCombinationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $products = DB::table('products')->get();
        $options = DB::table('options')->get();

        $optionGroups = [
            'star' => ['zr', 'rl1200', 'le', 'be', 'ff', 'gan'],
            'easy-xl' => ['rl1200', 'le', 'ff', 'tt', 'tb', 'gan'],
            'wlo' => ['rl1200', 'be', 'ff', 'tt', 'tb', 'gan'],
            'prime-xs' => ['rl1200p', 'be', 'ff', 'tt', 'gap'],
            'star-otc' => ['le', 'ff', 'gao', 'tb'],
            'big-foot' => ['rl350', 'rl1200', 'ffd', 'gab'],
        ];

        foreach ($products as $product) {
            if ($product->type === 'container-access-ramps') {
                $versionName = $product->version === 'galvanized' ? 'gal' : 'standard';
                $name = 'AZ-RAMP-' . strtoupper($product->base_name) . '-' . $product->weight_capacity . 'T-' . strtoupper($versionName);
                $slug = 'az-ramp-' . strtolower($product->base_name) . '-' . $product->weight_capacity . 't-' . strtolower($versionName);

                DB::table('product_combinations')->insert([
                    'product_id' => $product->id,
                    'name' => $name,
                    'slug' => $slug,
                    'total_price' => $product->base_price,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                $baseName = $product->base_name;

                if (!isset($optionGroups[$baseName])) {
                    continue;
                }

                $options = $optionGroups[$baseName];

                $optionCombinations = $this->getOptionCombinations($options, $baseName);

                foreach ($optionCombinations as $combination) {
                    $optionNames = array_map('strtoupper', $combination);
                    $optionSlugs = array_map('strtolower', $combination);

                    // Calculate the total price
                    $totalPrice = $product->base_price;

                    foreach ($combination as $optionName) {
                        $option = DB::table('options')->where('name', $optionName)->first();
                        if ($option) {
                            $totalPrice += $option->price;
                        }
                    }

                    // Generate name and slug
                    $name = 'AZ-RAMP-' . strtoupper($product->base_name) . '-' . $product->weight_capacity . 'T-' . strtoupper($product->version) . (empty($optionNames) ? '' : '-' . implode('-', $optionNames));
                    $slug = 'az-ramp-' . strtolower($product->base_name) . '-'  . $product->weight_capacity . 't-' . strtolower(str_replace(' ', '-', $product->version)) . (empty($optionSlugs) ? '' : '-' . implode('-', $optionSlugs));

                    // Insert the record into the product_combinations table
                    DB::table('product_combinations')->insert([
                        'product_id' => $product->id,
                        'name' => $name,
                        'slug' => $slug,
                        'total_price' => $totalPrice,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }

    /**
     * Generate all valid option combinations for a given set of options.
     *
     * @param array  $options
     * @param string $baseName
     * @return array
     */

     private function getOptionCombinations($options, $baseName)
     {
         $results = [[]];

         foreach ($options as $option) {
             $newResults = [];

             foreach ($results as $combination) {
                 $newCombination = array_merge($combination, [$option]);

                 // Skip invalid combinations for big-foot
                 if ($baseName === 'big-foot' && in_array('rl350', $newCombination) && in_array('rl1200', $newCombination)) {
                     continue;
                 }

                 $newResults[] = $newCombination;
             }

             $results = array_merge($results, $newResults);
         }

         return $results;
     }
}
