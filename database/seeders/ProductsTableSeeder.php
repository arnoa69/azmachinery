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

        $products = [
            'STAR' => [
                'weights' => [8, 10, 12, 15, 20],
                'versions' => ['standard', 'llo', 'xl', 'lloxl'],
                'basePrices' => [
                    'standard' => [12950, 13450, 14250, 15250, 16950],
                    'llo' => [15250, 15750, 16950, 17950, 19750],
                    'xl' => [18550, 18950, 19950, 20450, 22250],
                    'lloxl' => [20750, 21250, 22050, 23050, 24750],
                ],
                'total_length' => 10550,
                'total_width' => 2070,
                'used_width' => 1960,
                'length_inclined_plane' => 7150,
                'length_platform_horizontal' => 3310,
                'length_lip_penetrating' => 750,
                'entrance_tray_length' => 2100,
                'exit_lip_length' => 740,
                'slope_min' => 16.50,
                'slope_max' => 22.37,
                'unloaded_weight' => '2615-3315',
                'min_height' => 1000,
                'max_height' => 1600,
                'adjustments' => [
                    'llo' => [
                        'length_platform_horizontal' => 6000 - 3310,
                        'length_inclined_plane' => 7480 - 7150,
                    ],
                    'xl' => [
                        'total_width' => 2770 - 2070,
                        'used_width' => 2590 - 1960,
                    ],
                    'lloxl' => [
                        'length_platform_horizontal' => 6000 - 3310,
                        'length_inclined_plane' => 7480 - 7150,
                        'total_width' => 2770 - 2070,
                        'used_width' => 2590 - 1960,
                    ]
                ]
            ]
        ];

        $singleVersionProducts = [
            'EASY-XL' => [
                'weights' => [8, 10, 12, 15, 20],
                'version' => 'standard',
                'basePrices' => [13450, 14450, 15450, 16950, 17950],
                'details' => [
                    'total_length' => 11800,
                    'total_width' => 2270,
                    'used_width' => 2100,
                    'length_inclined_plane' => 10000,
                    'length_platform_horizontal' => 1850,
                    'length_lip_penetrating' => 750,
                    'entrance_tray_length' => 2100,
                    'exit_lip_length' => 340,
                    'slope_min' => 9.00,
                    'slope_max' => 15.50,
                    'unloaded_weight' => '2615-3315',
                    'min_height' => 900,
                    'max_height' => 1550,
                ]
            ],
            'WLO' => [
                'weights' => [8, 10, 12],
                'version' => 'standard',
                'basePrices' => [6750, 7250, 7750],
                'details' => [
                    'total_length' => 11800,
                    'total_width' => 2270,
                    'used_width' => 2100,
                    'length_inclined_plane' => 10000,
                    'length_platform_horizontal' => 1850,
                    'length_lip_penetrating' => 750,
                    'entrance_tray_length' => 2100,
                    'exit_lip_length' => 340,
                    'slope_min' => 9.00,
                    'slope_max' => 15.50,
                    'unloaded_weight' => '2615-3315',
                    'min_height' => 900,
                    'max_height' => 1550,
                ]
            ],
            'PRIME-XS' => [
                'weights' => [6, 8, 10],
                'version' => 'standard',
                'basePrices' => [9750, 10250, 10950],
                'details' => [
                    'total_length' => 11800,
                    'total_width' => 2270,
                    'used_width' => 2100,
                    'length_inclined_plane' => 10000,
                    'length_platform_horizontal' => 1850,
                    'length_lip_penetrating' => 750,
                    'entrance_tray_length' => 2100,
                    'exit_lip_length' => 340,
                    'slope_min' => 9.00,
                    'slope_max' => 15.50,
                    'unloaded_weight' => '2615-3315',
                    'min_height' => 900,
                    'max_height' => 1550,
                ]
            ],
            'STAR-OTC' => [
                'weights' => [8, 10, 12],
                'version' => 'standard',
                'basePrices' => [15750, 16750, 17750],
                'details' => [
                    'total_length' => 11800,
                    'total_width' => 2270,
                    'used_width' => 2100,
                    'length_inclined_plane' => 10000,
                    'length_platform_horizontal' => 1850,
                    'length_lip_penetrating' => 750,
                    'entrance_tray_length' => 2100,
                    'exit_lip_length' => 340,
                    'slope_min' => 9.00,
                    'slope_max' => 15.50,
                    'unloaded_weight' => '2615-3315',
                    'min_height' => 900,
                    'max_height' => 1550,
                ]
            ],
            'BIG-FOOT' => [
                'weights' => [15, 20, 25],
                'version' => 'standard',
                'basePrices' => [20750, 21750, 22950],
                'details' => [
                    'total_length' => 11800,
                    'total_width' => 2270,
                    'used_width' => 2100,
                    'length_inclined_plane' => 10000,
                    'length_platform_horizontal' => 1850,
                    'length_lip_penetrating' => 750,
                    'entrance_tray_length' => 2100,
                    'exit_lip_length' => 340,
                    'slope_min' => 9.00,
                    'slope_max' => 15.50,
                    'unloaded_weight' => '2615-3315',
                    'min_height' => 900,
                    'max_height' => 1550,
                ]
            ],
        ];

        $containerRamps = [
            'HCRN-06' => [
                'weights' => 6,
                'versions' => ['standard', 'galvanized'],
                'basePrices' => [1750, 2750],
                'details' => [
                    'total_length' => 2200,
                    'total_width' => 1250,
                    'used_width' => 1250,
                    'length_inclined_plane' => null,
                    'length_platform_horizontal' => null,
                    'length_lip_penetrating' => null,
                    'entrance_tray_length' => null,
                    'exit_lip_length' => null,
                    'slope_min' => null,
                    'slope_max' => null,
                    'unloaded_weight' => '176',
                    'min_height' => 160,
                    'max_height' => 160,
                ]
            ],
            'HCRN-065' => [
                'weights' => 6.5,
                'versions' => ['standard', 'galvanized'],
                'basePrices' => [2050, 3050],
                'details' => [
                    'total_length' => 2200,
                    'total_width' => 1800,
                    'used_width' => 1800,
                    'length_inclined_plane' => null,
                    'length_platform_horizontal' => null,
                    'length_lip_penetrating' => null,
                    'entrance_tray_length' => null,
                    'exit_lip_length' => null,
                    'slope_min' => null,
                    'slope_max' => null,
                    'unloaded_weight' => '295',
                    'min_height' => 160,
                    'max_height' => 160,
                ]
            ],
            'HCRN-08' => [
                'weights' => 8,
                'versions' => ['standard', 'galvanized'],
                'basePrices' => [1950, 2950],
                'details' => [
                    'total_length' => 2000,
                    'total_width' => 1500,
                    'used_width' => 1500,
                    'length_inclined_plane' => null,
                    'length_platform_horizontal' => null,
                    'length_lip_penetrating' => null,
                    'entrance_tray_length' => null,
                    'exit_lip_length' => null,
                    'slope_min' => null,
                    'slope_max' => null,
                    'unloaded_weight' => '280',
                    'min_height' => 160,
                    'max_height' => 160,
                ]
            ],
            'HCRY-08' => [
                'weights' => 8,
                'versions' => ['standard', 'galvanized'],
                'basePrices' => [1895, 2895],
                'details' => [
                    'total_length' => 2200,
                    'total_width' => 1500,
                    'used_width' => 1500,
                    'length_inclined_plane' => null,
                    'length_platform_horizontal' => null,
                    'length_lip_penetrating' => null,
                    'entrance_tray_length' => null,
                    'exit_lip_length' => null,
                    'slope_min' => null,
                    'slope_max' => null,
                    'unloaded_weight' => '227',
                    'min_height' => 160,
                    'max_height' => 160,
                ]
            ],
            'TOP-065' => [
                'weights' => 6.5,
                'versions' => ['standard'],
                'basePrices' => [2350],
                'details' => [
                    'total_length' => 2200,
                    'total_width' => 1750,
                    'used_width' => 1750,
                    'length_inclined_plane' => null,
                    'length_platform_horizontal' => null,
                    'length_lip_penetrating' => null,
                    'entrance_tray_length' => null,
                    'exit_lip_length' => null,
                    'slope_min' => null,
                    'slope_max' => null,
                    'unloaded_weight' => '227',
                    'min_height' => 100,
                    'max_height' => 100,
                ]
            ],
            'SECU-DOCK' => [
                'weights' => 10,
                'versions' => ['standard', 'galvanized'],
                'basePrices' => [2950, 3950],
                'details' => [
                    'total_length' => 3000,
                    'total_width' => 2180,
                    'used_width' => 2180,
                    'length_inclined_plane' => null,
                    'length_platform_horizontal' => null,
                    'length_lip_penetrating' => null,
                    'entrance_tray_length' => null,
                    'exit_lip_length' => null,
                    'slope_min' => null,
                    'slope_max' => null,
                    'unloaded_weight' => '720',
                    'min_height' => 200,
                    'max_height' => 200,
                ]
            ],
            'HCBN-08' => [
                'weights' => 8,
                'versions' => ['standard', 'galvanized'],
                'basePrices' => [2750, 3750],
                'details' => [
                    'total_length' => 2000,
                    'total_width' => 2000,
                    'used_width' => 2000,
                    'length_inclined_plane' => null,
                    'length_platform_horizontal' => null,
                    'length_lip_penetrating' => null,
                    'entrance_tray_length' => null,
                    'exit_lip_length' => null,
                    'slope_min' => null,
                    'slope_max' => null,
                    'unloaded_weight' => '295',
                    'min_height' => 300,
                    'max_height' => 300,
                ]
            ],
            'CLR8' => [
                'weights' => 8,
                'versions' => ['standard', 'galvanized'],
                'basePrices' => [4450, 5950],
                'details' => [
                    'total_length' => 3060,
                    'total_width' => 2438,
                    'used_width' => 2180,
                    'length_inclined_plane' => null,
                    'length_platform_horizontal' => null,
                    'length_lip_penetrating' => null,
                    'entrance_tray_length' => null,
                    'exit_lip_length' => null,
                    'slope_min' => null,
                    'slope_max' => null,
                    'unloaded_weight' => '450',
                    'min_height' => 200,
                    'max_height' => 200,
                ]
            ],
        ];

        try {
            foreach ($products as $productType => $productDetails) {
                foreach ($productDetails['weights'] as $index => $weight) {
                    foreach ($productDetails['versions'] as $version) {
                        $adjustments = $productDetails['adjustments'][$version] ?? [];

                        $totalLength = $productDetails['total_length'];
                        $totalWidth = $productDetails['total_width'];
                        $usedWidth = $productDetails['used_width'];
                        $lengthInclinedPlane = $productDetails['length_inclined_plane'];
                        $lengthPlatformHorizontal = $productDetails['length_platform_horizontal'];

                        if (isset($adjustments['total_width'])) {
                            $totalWidth = $adjustments['total_width'];
                        }

                        if (isset($adjustments['used_width'])) {
                            $usedWidth = $adjustments['used_width'];
                        }

                        if (isset($adjustments['length_platform_horizontal'])) {
                            $lengthPlatformHorizontal += $adjustments['length_platform_horizontal'];
                        }

                        if (isset($adjustments['length_inclined_plane'])) {
                            $lengthInclinedPlane += $adjustments['length_inclined_plane'];
                        }

                        DB::table('products')->insert([
                            'type' => 'mobile',
                            'base_name' => strtolower($productType),
                            'version' => $version,
                            'base_price' => $productDetails['basePrices'][$version][$index],
                            'weight_capacity' => $weight,
                            'total_length' => $totalLength,
                            'total_width' => $totalWidth,
                            'width_used' => $usedWidth,
                            'length_inclined_plane' => $lengthInclinedPlane,
                            'length_plateform_horizontal' => $lengthPlatformHorizontal,
                            'length_lip_penetrating' => $productDetails['length_lip_penetrating'],
                            'entrance_tray_length' => $productDetails['entrance_tray_length'],
                            'exit_lip_length' => $productDetails['exit_lip_length'],
                            'slope_min' => $productDetails['slope_min'],
                            'slope_max' => $productDetails['slope_max'],
                            'unloaded_weight' => $productDetails['unloaded_weight'],
                            'min_height' => $productDetails['min_height'],
                            'max_height' => $productDetails['max_height'],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }

            foreach ($singleVersionProducts as $productType => $productInfo) {
                foreach ($productInfo['weights'] as $index => $weight) {
                    DB::table('products')->insert([
                        'type' => 'mobile',
                        'base_name' => strtolower($productType),
                        'version' => $productInfo['version'],
                        'base_price' => $productInfo['basePrices'][$index],
                        'weight_capacity' => $weight,
                        'total_length' => $productInfo['details']['total_length'],
                        'total_width' => $productInfo['details']['total_width'],
                        'width_used' => $productInfo['details']['used_width'],
                        'length_inclined_plane' => $productInfo['details']['length_inclined_plane'],
                        'length_plateform_horizontal' => $productInfo['details']['length_platform_horizontal'],
                        'length_lip_penetrating' => $productInfo['details']['length_lip_penetrating'],
                        'entrance_tray_length' => $productInfo['details']['entrance_tray_length'],
                        'exit_lip_length' => $productInfo['details']['exit_lip_length'],
                        'slope_min' => $productInfo['details']['slope_min'],
                        'slope_max' => $productInfo['details']['slope_max'],
                        'unloaded_weight' => $productInfo['details']['unloaded_weight'],
                        'min_height' => $productInfo['details']['min_height'],
                        'max_height' => $productInfo['details']['max_height'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            foreach ($containerRamps as $productType => $productInfo) {
                foreach ($productInfo['versions'] as $index => $version) {
                    DB::table('products')->insert([
                        'type' => 'container-access-ramps',
                        'base_name' => strtolower($productType),
                        'version' => $version,
                        'base_price' => $productInfo['basePrices'][$index],
                        'weight_capacity' => $productInfo['weights'],
                        'total_length' => $productInfo['details']['total_length'],
                        'total_width' => $productInfo['details']['total_width'],
                        'width_used' => $productInfo['details']['used_width'],
                        'length_inclined_plane' => $productInfo['details']['length_inclined_plane'],
                        'length_plateform_horizontal' => $productInfo['details']['length_platform_horizontal'],
                        'length_lip_penetrating' => $productInfo['details']['length_lip_penetrating'],
                        'entrance_tray_length' => $productInfo['details']['entrance_tray_length'],
                        'exit_lip_length' => $productInfo['details']['exit_lip_length'],
                        'slope_min' => $productInfo['details']['slope_min'],
                        'slope_max' => $productInfo['details']['slope_max'],
                        'unloaded_weight' => $productInfo['details']['unloaded_weight'],
                        'min_height' => $productInfo['details']['min_height'],
                        'max_height' => $productInfo['details']['max_height'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

        } catch (\Exception $e) {
            // Log the error or handle it as needed
            \Log::error('Failed to insert product: ' . $e->getMessage());
        }
    } // end of product function
}
