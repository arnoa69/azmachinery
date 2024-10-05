<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Gemini\Laravel\Facades\Gemini;

class GenerateEnglishProductDescriptions extends Command
{
    protected $signature = 'generate:english-product-descriptions';
    protected $description = 'Generate English language file for product_descriptions and translate them to other languages';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->generateEnglishDescriptions();
    }

    private function generateEnglishDescriptions()
    {
        $country = env('VITE_APP_COUNTRY', 'azmch');
        $basePath = resource_path("js/locales/{$country}/products");
        $enFilePath = "{$basePath}/en.json";

        if (!File::exists($enFilePath)) {
            File::put($enFilePath, '{}');
        }

        $enData = json_decode(File::get($enFilePath), true);
        $lastProcessedSlug = $this->getLastProcessedSlug($enData);

        $products = DB::table('product_combinations')
            ->join('products', 'product_combinations.product_id', '=', 'products.id')
            ->select('product_combinations.slug', 'products.weight_capacity', 'products.version')
            ->get()
            ->toArray();

        $totalProducts = count($products);
        $startIndex = $this->getStartIndex($products, $lastProcessedSlug);
        $processedProducts = $startIndex;

        foreach (array_slice($products, $startIndex) as $product) {
            $slug = $product->slug;

            if (isset($enData[$slug]['product_description']) && !empty($enData[$slug]['product_description'])) {
                $this->displayProgress($processedProducts, $totalProducts);
                continue;
            }

            $content = $this->generateDescription($product);
            $enData[$slug] = ['product_description' => $content];

            File::put($enFilePath, json_encode($enData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

            $processedProducts++;
            $this->displayProgress($processedProducts, $totalProducts);

            sleep(9);
        }

        $this->info('English file generated successfully.');
    }

    private function getLastProcessedSlug(array $enData): string
    {
        foreach ($enData as $slug => $item) {
            if (empty($item['product_description'])) {
                return $slug;
            }
        }
        return '';
    }

    private function getStartIndex(array $products, string $lastProcessedSlug): int
    {
        foreach ($products as $index => $product) {
            if ($product->slug === $lastProcessedSlug) {
                return $index;
            }
        }
        return 0;
    }


    private function displayProgress($processed, $total)
    {
        $percentage = ($processed / $total) * 100;
        $this->info(sprintf("Progress: %.2f%% (%d von %d)", $percentage, $processed, $total));
    }

    private function generateDescription($product)
    {
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

        return $content; // Rückgabe der generierten Beschreibung
    }
}
