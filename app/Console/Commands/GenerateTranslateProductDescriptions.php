<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Gemini\Laravel\Facades\Gemini;

class GenerateTranslateProductDescriptions extends Command
{
    protected $signature = 'generate:translate-product-descriptions';
    protected $description = 'Generate translations from english to other languages';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->translateDescriptions();
    }


    private function translateDescriptions()
    {
        $country = env('VITE_APP_COUNTRY', 'azmch');
        $basePath = resource_path('js/locales/' . $country . '/products');
        $enFilePath = "{$basePath}/en.json";

        if (!File::exists($enFilePath)) {
            $this->error('English file does not exist. Please generate it first.');
            return;
        }

        $enData = json_decode(File::get($enFilePath), true);
        $languages = ['de', 'dk', 'ee', 'en', 'es', 'fi', 'fr', 'it', 'lu', 'nl', 'no', 'pt', 'se'];

        foreach ($languages as $language) {
            if ($language === 'en') {
                continue;
            }

            $langFilePath = "{$basePath}/{$language}.json";
            $langData = [];
            $lastProcessedSlug = '';

            if (File::exists($langFilePath)) {
                $langData = json_decode(File::get($langFilePath), true);
                // Überprüfen, wo wir aufgehört haben
                if (isset($langData['last_processed_slug'])) {
                    $lastProcessedSlug = $langData['last_processed_slug'];
                }
            }

            // Finden Sie den Startpunkt für die Übersetzung
            $totalDescriptions = count($enData);
            $processedDescriptions = 0;
            $startTranslating = false;
            $buffer = []; // Puffer für die Übersetzungen

            foreach ($enData as $slug => $item) {
                if ($startTranslating || $slug === $lastProcessedSlug) {
                    $startTranslating = true; // Beginnen Sie mit der Übersetzung

                    $translationPrompt = "Translate the following text to $language: " . $item['product_description'];
                    $translationResult = Gemini::geminiPro()->generateContent($translationPrompt);

                    if (isset($translationResult->candidates[0]->content->parts[0]->text)) {
                        $translatedContent = trim(strip_tags($translationResult->candidates[0]->content->parts[0]->text));
                        $buffer[$slug] = [
                            'product_description' => $translatedContent,
                        ];

                        // Speichern Sie den letzten verarbeiteten Slug
                        $langData['last_processed_slug'] = $slug;
                    } else {
                        $this->error("Translation failed for $slug in $language.");
                    }

                    $processedDescriptions++;
                    $this->displayProgress($processedDescriptions, $totalDescriptions);

                    // Schreiben Sie den Puffer in die Datei nach jeweils 10 Übersetzungen
                    if ($processedDescriptions % 10 == 0) {
                        $langData = array_merge($langData, $buffer);
                        File::put($langFilePath, json_encode($langData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                        $buffer = []; // Puffer zurücksetzen
                    }
                }
            }

            // Schreiben Sie verbleibende Daten, falls vorhanden
            if (!empty($buffer)) {
                $langData = array_merge($langData, $buffer);
                File::put($langFilePath, json_encode($langData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }

            $this->info("Translation for {$language} generated successfully.");
        }
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