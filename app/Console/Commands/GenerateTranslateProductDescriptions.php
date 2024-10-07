<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Gemini\Laravel\Facades\Gemini;

class GenerateTranslateProductDescriptions extends Command
{
    protected $signature = 'generate:translate-product-descriptions {language}';
    protected $description = 'Generate translations from english to other languages';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $language = $this->argument('language'); // Hier wird das Argument abgerufen
        $this->translateDescriptions($language);
    }


    private function translateDescriptions($language)
    {
        $country = env('VITE_APP_COUNTRY', 'azmch');
        $validLanguages = ['de', 'dk', 'ee', 'en', 'es', 'fi', 'fr', 'it', 'lu', 'nl', 'no', 'pt', 'se'];
        $basePath = resource_path('js/locales/' . $country . '/products');

        $enFilePath = "{$basePath}/en.json";
        $langFilePath = "{$basePath}/{$language}.json";

        if (!File::exists($enFilePath)) {
            $this->error('English file does not exist. Please generate it first.');
            return;
        }

        if (!in_array($language, $validLanguages)) {
            $this->error("The specified language '$language' is not valid.");
            return;
        }

        $enData = json_decode(File::get($enFilePath), true);
        $langData = json_decode(File::get($langFilePath), true);
        $lastProcessedSlugIndex = $this->getLastProcessedSlugIndex($langData);
        $totalProducts = count($enData);
        $processedProducts = $lastProcessedSlugIndex;
        $remainingProducts = array_slice($enData, $lastProcessedSlugIndex);

        foreach ($remainingProducts as $slug => $enContent) {
            if (isset($langData[$slug]['product_description']) && !empty($langData[$slug]['product_description'])) {
                $this->displayProgress($processedProducts, $totalProducts);
                continue;
            }

            $langContent = $this->translateDescription($language, $enContent['product_description']);
            $langData[$slug]['product_description'] = $langContent;

            File::put($langFilePath, json_encode($langData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

            $processedProducts++;
            $this->displayProgress($processedProducts, $totalProducts);

            sleep(10);
        }

        $this->info('German file generated and translated successfully.');
    }

    private function getLastProcessedSlugIndex(array $langData): int
    {
        $index = 0;
        foreach ($langData as $slug => $item) {
            if (empty($item['product_description'])) {
                return $index;
            }
            $index++;
        }
        return 0;
    }

    private function translateDescription($language, $orgContent)
    {
        $translationPrompt = "Translate the following text to $language: " . $orgContent;
        $translationResult = Gemini::geminiPro()->generateContent($translationPrompt);

        if (isset($translationResult->candidates[0]->content->parts[0]->text)) {
            $translatedContent = trim(strip_tags($translationResult->candidates[0]->content->parts[0]->text));

        } else {
            throw new \Exception("Translation result is empty for this product");
        }

        return $translatedContent;
    }

    private function displayProgress($processed, $total)
    {
        $percentage = ($processed / $total) * 100;
        $this->info(sprintf("Progress: %.2f%% (%d von %d)", $percentage, $processed, $total));
    }

    private function getLastProcessedSlug(array $langData): string
    {
        foreach ($langData as $slug => $item) {
            if (empty($item['product_description'])) {
                return $slug;
            }
        }
        return '';
    }
}
