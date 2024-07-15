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

        foreach ($products as $product) {
            $optionCombinations = $this->getOptionCombinations($options);

            foreach ($optionCombinations as $combination) {
                $totalPrice = $product->base_price;

                $optionNames = [];
                $optionSlugs = [];
                foreach ($combination as $option) {
                    $totalPrice += $option->price;
                    $optionNames[] = strtoupper($option->name);
                    $optionSlugs[] = $option->name;
                }

                $name = 'AZ-RAMP-STAR-' . $product->weight_capacity . 'T-' . strtoupper($product->version) . (empty($optionNames) ? '' : '-' . implode('-', $optionNames));
                $slug = 'az-ramp-star-' . $product->weight_capacity . 't-' . strtolower(str_replace(' ', '-', $product->version)) . (empty($optionSlugs) ? '' : '-' . implode('-', $optionSlugs));

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

    private function getOptionCombinations($options)
    {
        $results = [[]];

        foreach ($options as $option) {
            foreach ($results as $combination) {
                $results[] = array_merge([$option], $combination);
            }
        }

        return $results;
    }
}
