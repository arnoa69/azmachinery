<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Gemini\Laravel\Facades\Gemini;

class GenerateEnglishFile extends Command
{
    protected $signature = 'generate:english-file';
    protected $description = 'Generate English language file for products';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $country = env('VITE_APP_COUNTRY', 'azmch'); // 'default_country' is a fallback value
        $basePath = resource_path('js/locales/' . $country . '/products');

        // Initialize the English data array
        $enData = [];

        // Create the English language file first
        $enFilePath = "{$basePath}/en.json";

        // If the English file exists, load existing data
        if (File::exists($enFilePath)) {
            $enData = json_decode(File::get($enFilePath), true);
        }

        // Find the first empty description
        $startId = 0;
        foreach ($enData as $index => $item) {
            if (empty($item['product_description'])) {
                $parts = explode('-', $index);
                $startId = DB::table('product_combinations')
                    ->where('slug', $index)
                    ->value('id');
                break;
            }
        }

        if ($startId === 0) {
            $this->info('All products already have descriptions.');
            return;
        }

        // Fetch product combinations from the database starting from the identified ID
        $products = DB::table('product_combinations')
            ->where('id', '>=', $startId)
            ->select('id', 'slug')->take(10)
            ->get();

        // Define the versions map
        $versionsMap = [
            'standard' => 'standard-size',
            'llo' => 'long-leveler-off',
            'xl' => 'extra-large',
            'lloxl' => 'long-leveler-off-extra-large'
        ];

        // Define the options map
        $optionsMap = [
            'zr' => 'zone-refuge',
            'rl' => 'side-railings',
            'e' => 'electric',
            'ff' => 'fork-slider',
            'gal' => 'full-galvanized',
            'tb' => 'tarpaulin-tunnel',
        ];

        // Generate English descriptions and names
        foreach ($products as $product) {
            $slug = $product->slug;

            // Parse the slug to generate the description
            $parts = explode('-', $slug);
            $capacity = $parts[3]; // 8t
            $version = $parts[4]; // standard
            $options = array_slice($parts, 5); // ['gal', 'e', 'rl', 'zr']

            // Get the version description
            $versionDescription = $versionsMap[$version] ?? $version;

            // Build the options description
            $optionsDescription = array_map(function ($option) use ($optionsMap) {
                return $optionsMap[$option] ?? $option;
            }, $options);

            // Construct the prompt for Gemini
            $prompt = "It is a mobile loading ramp for capacities up to $capacity. It is the $versionDescription version and has the following options: " . implode(', ', $optionsDescription) . ".";
            $instruction = "Generate plain text content for a product detail page with a maximum length of 450 characters. Do not include any titles, headings, or lists.";

            // Generate content using Gemini for English
            $result = Gemini::geminiPro()->generateContent($instruction . ' ' . $prompt);
            $content = trim(strip_tags($result->candidates[0]->content->parts[0]->text));

            // Add or update products in the data array
            $enData[$slug] = [
                'product_description' => $content,
            ];
        }

        // Write the English data to the file
        File::put($enFilePath, json_encode($enData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        $this->info('English file generated successfully.');
    }
}
