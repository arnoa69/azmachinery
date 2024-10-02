<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Gemini\Laravel\Facades\Gemini;

class GenerateProductDescriptions extends Command
{
    protected $signature = 'generate:product-descriptions';
    protected $description = 'Generate English language file for product_descriptions and translate them to other languages';

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

        // If no empty descriptions are found, set startId to 1 to process the first product
        if ($startId === 0) {
            $startId = 1;
        }

        // Fetch the product with ID 1
        $product = DB::table('product_combinations')
            ->join('products', 'product_combinations.product_id', '=', 'products.id')
            ->select('product_combinations.slug', 'products.weight_capacity', 'products.version')
            ->first();

        if (!$product) {
            $this->info('Product with the specified ID does not exist.');
            return;
        }

        $slug = $product->slug;
        $capacity = $product->weight_capacity; // Directly from the products table
        $version = $product->version; // Directly from the products table

        // Define the options map
        $optionsMap = [
            'zr' => 'zone-refuge',
            'rl1200' => 'side-railings',
            'rl1200p' => 'side-railings-prime-xs',
            'rl350' => 'side-railings-350',
            'le' => 'electric-lift',
            'be' => 'electric-crutches',
            'ff' => 'fork-slider',
            'dff' => 'double-fork-slider',
            'tt' => 'traction-drawbar',
            'gan' => 'full-galvanized',
            'gap' => 'full-galvanized',
            'gab' => 'full-galvanized',
            'gao' => 'full-galvanized',
            'tb' => 'tarpaulin-tunnel',
        ];

        // Extract options from the slug
        $parts = explode('-', $slug);
        $versionKey = strtolower($version);
        $options = array_slice($parts, array_search($versionKey, $parts) + 1);
        $optionsDescription = [];

        // Build the options description
        foreach ($options as $option) {
            if (isset($optionsMap[$option])) {
                $optionsDescription[] = $optionsMap[$option];
            }
        }

        // Construct the prompt for Gemini
        $optionsText = !empty($optionsDescription) ? implode(', ', $optionsDescription) : 'without options';
        $prompt = "It is a mobile loading ramp for capacities up to $capacity. It is the $version version and has the following options: $optionsText.";
        $instruction = "Generate plain text content for a product detail page with a maximum length of 450 characters. Do not include any titles, headings, or lists.";

        // Generate content using Gemini for English
        $result = Gemini::geminiPro()->generateContent($instruction . ' ' . $prompt);
        $content = trim(strip_tags($result->candidates[0]->content->parts[0]->text));

        // Add or update the product in the English data array
        $enData[$slug] = [
            'product_description' => $content,
        ];

        // Write the English data to the file
        File::put($enFilePath, json_encode($enData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        $this->info('English file generated successfully.');

        // Define the list of languages
        $languages = ['de', 'dk', 'ee', 'en', 'es', 'fi', 'fr', 'it', 'lu', 'nl', 'no', 'pt', 'se'];

        // Translate the content into other languages
        foreach ($languages as $language) {
            if ($language === 'en') {
                continue; // Skip English since it's already done
            }

            $langFilePath = "{$basePath}/{$language}.json";
            $langData = [];

            // Load existing language data if the file exists
            if (File::exists($langFilePath)) {
                $langData = json_decode(File::get($langFilePath), true);
            }

            // Generate translation using Gemini
            $translationPrompt = "Translate the following text to $language: " . $content;
            $translationResult = Gemini::geminiPro()->generateContent($instruction . ' ' . $translationPrompt);
            $translatedContent = trim(strip_tags($translationResult->candidates[0]->content->parts[0]->text));

            // Add or update the product in the language data array
            $langData[$slug] = [
                'product_description' => $translatedContent,
            ];

            // Write the language data to the file
            File::put($langFilePath, json_encode($langData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            $this->info("Translation for {$language} generated successfully.");
        }
    }
}
