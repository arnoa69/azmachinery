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
        $basePath = resource_path('js/locales/' . $country . '/products');
        $enData = [];
        $enFilePath = "{$basePath}/en.json";

        if (File::exists($enFilePath)) {
            $enData = json_decode(File::get($enFilePath), true);
        }

        // Finde den letzten verarbeiteten Slug
        $lastProcessedSlug = '';
        if (!empty($enData)) {
            foreach ($enData as $index => $item) {
                if (!empty($item['product_description'])) {
                    $lastProcessedSlug = $index; // Letzten verarbeiteten Slug speichern
                }
            }
        }

        // Holen Sie sich alle Produkte
        $products = DB::table('product_combinations')
            ->join('products', 'product_combinations.product_id', '=', 'products.id')
            ->select('product_combinations.slug', 'products.weight_capacity', 'products.version')
            ->get();

        $totalProducts = $products->count();
        $processedProducts = 0;
        $buffer = [];

        // Konvertieren Sie die Laravel Eloquent-Sammlung $products in ein Array für array_chunk
        $products = $products->toArray();
        foreach (array_chunk($products, 5) as $chunk) { // Verarbeite 5 Produkte gleichzeitig
            foreach ($chunk as $product) {
                $slug = $product->slug;

                // Überspringen, wenn bereits eine Beschreibung vorhanden ist oder wir bereits bei diesem Slug sind
                if (isset($enData[$slug]['product_description']) && !empty($enData[$slug]['product_description'])) {
                    $processedProducts++;
                    $this->displayProgress($processedProducts, $totalProducts);
                    continue;
                }

                // Wenn wir den letzten verarbeiteten Slug erreicht haben, setzen wir die Verarbeitung fort
                if ($slug === $lastProcessedSlug) {
                    // Beginnen Sie mit der Verarbeitung des nächsten Produkts
                    continue;
                }

                // Generiere die Beschreibung
                $content = $this->generateDescription($product);
                // Speichern Sie die Beschreibung im Puffer
                $buffer[$slug] = [
                    'product_description' => $content,
                ];
                $processedProducts++;
                $this->displayProgress($processedProducts, $totalProducts);

                // Schreiben Sie den Puffer in die Datei alle 100 Produkte
                if ($processedProducts % 5 == 0) {
                    $enData = array_merge($enData, $buffer);
                    File::put($enFilePath, json_encode($enData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                    $buffer = []; // Puffer zurücksetzen
                }
            }
            // Schlafen für 3 Sekunden nach jedem Batch
            sleep(3);
        }

        // Schreiben Sie verbleibende Daten in die Datei, falls vorhanden
        if (!empty($buffer)) {
            $enData = array_merge($enData, $buffer);
            File::put($enFilePath, json_encode($enData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }

        $this->info('English file generated successfully.');
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
