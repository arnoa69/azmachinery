<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Gemini\Laravel\Facades\Gemini;

class GenerateLanguageFiles extends Command
{
    protected $signature = 'generate:language-files';
    protected $description = 'Generate language files for products';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     * Execute the console command to generate language files.
     * ! ee is et and lu is lb in iso 639-1
     * @return void
     */
    public function handle()
    {
        $country = env('VITE_APP_COUNTRY', 'azmch'); // 'default_country' is a fallback value
        $languages = ['de', 'dk', 'ee', 'en', 'es', 'fi', 'fr', 'it', 'lu', 'nl', 'no', 'pt', 'se']; // Add other languages as needed
        $basePath = resource_path('js/locales/' . $country . '/products');

        // Fetch all product combinations from the database
        $products = DB::table('product_combinations')->select('slug')->get();

        foreach ($languages as $lang) {
            $filePath = "{$basePath}/{$lang}.json";

            // Initialize the data array
            $data = [];

            // If the file exists, load existing data
            if (File::exists($filePath)) {
                $data = json_decode(File::get($filePath), true);
            }

            // Add or update products in the data array
            foreach ($products as $product) {
                $slug = $product->slug;
                if (!isset($data[$slug])) {
                    $data[$slug] = [
                        'product_description' => '',
                    ];
                }
            }

            // Write the updated data back to the file
            File::put($filePath, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }

        $this->info('Language files generated successfully.');
        }
}
