<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Constants for the standard version (in mm and degrees)
        $STANDARD_TOTAL_LENGTH = 10550;
        $STANDARD_TOTAL_WIDTH = 2070;
        $STANDARD_LENGTH_INCLINED_PLANE = 7150;
        $STANDARD_LENGTH_PLATEFORM_HORIZONTAL = 3310;
        $STANDARD_LENGTH_LIP_PENETRATING = 750;
        $STANDARD_ENTRANCE_TRAY_LENGTH = 2100;
        $STANDARD_EXIT_LIP_LENGTH = 740;
        $STANDARD_SLOPE_MIN = 16.50;
        $STANDARD_SLOPE_MAX = 22.37;
        $STANDARD_UNLOADED_WEIGHT_FROM = 2615;
        $STANDARD_UNLOADED_WEIGHT_TO = 3315;
        $STANDARD_MIN_HEIGHT = 1000;
        $STANDARD_MAX_HEIGHT = 1600;

        // Adjustments for other versions
        $LLO_ADJUSTMENT = 200;
        $XL_ADJUSTMENT = 300;
        $LLO_XL_ADJUSTMENT = 500;

        $basePrices = [
            'standard' => [12950, 13450, 14250, 15250, 16950],
            'llo' => [15250, 15750, 16950, 17950, 19750],
            'xl' => [18550, 18950, 19950, 20450, 22250],
            'llo xl' => [20750, 21250, 22050, 23050, 24750],
        ];

        $weights = [8, 10, 12, 15, 20];

        foreach (['standard', 'llo', 'xl', 'llo xl'] as $version) {
            foreach ($weights as $index => $weight) {
                $adjustment = 0;
                switch ($version) {
                    case 'llo':
                        $adjustment = $LLO_ADJUSTMENT;
                        break;
                    case 'xl':
                        $adjustment = $XL_ADJUSTMENT;
                        break;
                    case 'llo xl':
                        $adjustment = $LLO_XL_ADJUSTMENT;
                        break;
                }

                DB::table('products')->insert([
                    'type' => 'mobile',
                    'version' => $version,
                    'weight_capacity' => $weight,
                    'base_price' => $basePrices[$version][$index],
                    'total_length' => $STANDARD_TOTAL_LENGTH + $adjustment,
                    'total_width' => $STANDARD_TOTAL_WIDTH + $adjustment,
                    'width_used' => $STANDARD_TOTAL_WIDTH + $adjustment, // Assuming width used is same as total width
                    'length_inclined_plane' => $STANDARD_LENGTH_INCLINED_PLANE + $adjustment,
                    'length_plateform_horizontal' => $STANDARD_LENGTH_PLATEFORM_HORIZONTAL + $adjustment,
                    'length_lip_penetrating' => $STANDARD_LENGTH_LIP_PENETRATING + $adjustment,
                    'entrance_tray_length' => $STANDARD_ENTRANCE_TRAY_LENGTH + $adjustment,
                    'exit_lip_length' => $STANDARD_EXIT_LIP_LENGTH + $adjustment,
                    'slope_min' => $STANDARD_SLOPE_MIN,
                    'slope_max' => $STANDARD_SLOPE_MAX,
                    'unloaded_weight' => $STANDARD_UNLOADED_WEIGHT_FROM + $adjustment,
                    'min_height' => $STANDARD_MIN_HEIGHT,
                    'max_height' => $STANDARD_MAX_HEIGHT,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
