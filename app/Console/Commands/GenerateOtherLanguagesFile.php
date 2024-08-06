<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Gemini\Laravel\Facades\Gemini;

class GenerateOtherLanguagesFile extends Command
{
    protected $signature = 'generate:other-languages-file';
    protected $description = 'Generate language files for products';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $country = env('VITE_APP_COUNTRY', 'azmch'); // 'default_country' is a fallback value

        // Define the languages and file paths
        $languages = ['de', 'dk', 'ee', 'en', 'es', 'fi', 'fr', 'it', 'lu', 'nl', 'no', 'pt', 'se']; // Add other languages as needed
        $basePath = resource_path('js/locales/' . $country . '/products');

        // Fetch all product combinations from the database
        $products = DB::table('product_combinations')->select('slug')->get();

        // Initialize the English data array
        $enData = [];

        // Create the English language file first
        $enFilePath = "{$basePath}/en.json";

        // If the English file exists, load existing data
        if (File::exists($enFilePath)) {
            $enData = json_decode(File::get($enFilePath), true);
        }

        // Generate English descriptions and names
        foreach ($products as $product) {
            $slug = $product->slug;

            // Parse the slug to generate the description
            $parts = explode('-', $slug);
            $capacity = $parts[3]; // 8t
            $version = $parts[4]; // standard
            $options = array_slice($parts, 5); // ['gal', 'e', 'rl', 'zr']

            // Define the options map
            $optionsMap = [
                'zr' => 'zone-refuge',
                'rl' => 'side-railings',
                'e' => 'electric',
                'ff' => 'fork-slider',
                'gal' => 'full-galvanized',
                'tb' => 'tarpaulin-tunnel',
            ];

            // Build the options description
            $optionsDescription = array_map(function($option) use ($optionsMap) {
                return $optionsMap[$option] ?? $option;
            }, $options);

            // Construct the prompt for Gemini
            $prompt = "It is a mobile loading ramp for capacities up to $capacity. It is the $version version and has the following options: " . implode(', ', $optionsDescription) . ".";
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

        // Process each other language
        foreach ($languages as $lang) {
            if ($lang == 'en') continue;

            $filePath = "{$basePath}/{$lang}.json";

            // Initialize the data array
            $data = [];

            // If the file exists, load existing data
            if (File::exists($filePath)) {
                $data = json_decode(File::get($filePath), true);
            }

            foreach ($products as $product) {
                $slug = $product->slug;
                $name = $product->name;

                // Ensure the product name is set
                if (!isset($data[$slug])) {
                    $data[$slug] = [
                        'product_description' => '',
                    ];
                }

                // Translate the English description
                $enDescription = $enData[$slug]['product_description'] ?? '';

                // Generate translated content using Gemini
                $translationPrompt = "Translate the following product description to $lang: \"$enDescription\"";
                $translationResult = Gemini::geminiPro()->generateContent($translationPrompt);
                $translatedContent = trim(strip_tags($translationResult->candidates[0]->content->parts[0]->text));

                // Update the product description with translated content
                $data[$slug]['product_description'] = $translatedContent;
            }

            // Write the updated data back to the file
            File::put($filePath, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }

        $this->info('Language files generated successfully.');
    }
}
