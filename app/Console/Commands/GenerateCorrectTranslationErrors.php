<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Gemini\Laravel\Facades\Gemini;
use Stichoza\GoogleTranslate\GoogleTranslate;


class GenerateCorrectTranslationErrors extends Command
{
    protected $signature = 'generate:correct-translation-errors {language}';
    protected $description = 'Korrigiere Übersetzungsfehler in der angegebenen Sprache';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $language = $this->argument('language'); // Sprache abrufen
        $this->correctTranslations($language);
    }

    private function correctTranslations($language)
    {
        $gt = new GoogleTranslate($language);

        try {
        $country = env('VITE_APP_COUNTRY', 'azmch');
        $langFilePath = resource_path("js/locales/{$country}/products/{$language}.json");
        $validLanguages = ['de', 'dk', 'et', 'en', 'es', 'fi', 'fr', 'it', 'lb', 'nl', 'no', 'pt', 'se'];


        $lastProcessedIndex= $this->getLastProcessedIndex($country,$language);

        if (!in_array($language, $validLanguages)) {
            $this->error("Die angegebene Sprache '$language' ist nicht gültig.");
            return;
        }

        if (!File::exists($langFilePath)) {
            $this->error("Die Datei für die Sprache '{$language}' existiert nicht.");
            return;
        }

        $langData = json_decode(File::get($langFilePath), true);
        $keys = array_keys($langData);

        // Check if the current index is valid
        if ($lastProcessedIndex < 0 || $lastProcessedIndex >= count($keys)) {
            echo "Invalid index in log file.";
            exit;
        }

        $totalProducts = count($langData);

        for($i = $lastProcessedIndex; $i < count($keys); $i++) {
            $slug = $keys[$i];
            $content = $langData[$slug];
            if(empty($content['product_description'])) {
                $jsonString = json_encode($langData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                if (file_put_contents($langFilePath, $jsonString) === false) {
                    throw new \Exception("Error writing to JSON file.");
                } else {
                    $this->info("Fichier mis à jour avec succès.");
                }
            }
            $currentDescription = $content['product_description'];
            //$detectedLanguage = $this->detectLanguage($currentDescription);
            $translatedText = $gt->translate($currentDescription);
            $detectedLanguage = $gt->getLastDetectedSource();

            if ($detectedLanguage !== $language) {
                $langData[$slug]['product_description'] = $translatedText;
                $jsonString = json_encode($langData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

                if (File::put($langFilePath, $jsonString) === false) {
                    throw new \Exception("Error writing to JSON file.");
                }
                $this->info("Faute decouverte... mise à jour de {$detectedLanguage} vers {$language}");
            }
            $this->saveLastProcessedIndex($country,$language, $slug);
            $this->displayProgress($i, $totalProducts);
            sleep(3);
        }
        $this->info("Fichier complet mis à jour avec succès. FIN");

        } catch (\Exception $e) {
            $this->error("Une erreur s'est produite : " . $e->getMessage());
        }
    }

    private function getLastProcessedIndex($country, $language)
    {
        $indexFilePath = storage_path("last_processed_{$country}_{$language}.txt");
        if (File::exists($indexFilePath)) {
            return (int)File::get($indexFilePath);
        }

        return 0; // Wenn die Datei nicht existiert, beginne bei 0
    }

    private function saveLastProcessedIndex($country, $language, $slug)
    {
        $indexFilePath = storage_path("last_processed_{$country}_{$language}.txt");
        $index = array_search($slug, array_keys(json_decode(File::get(resource_path("js/locales/" . env('VITE_APP_COUNTRY', 'azmch') . "/products/{$language}.json")), true)));

        if ($index !== false) {
            File::put($indexFilePath, $index);
        }
    }

    /**
     * Übersetzt den gegebenen Text von $fromLanguage nach $toLanguage und gibt den übersetzten Text zurück.
     * Wenn die Übersetzung fehlschlägt, wird eine Exception geworfen.
     *
     * @param string $fromLanguage
     * @param string $toLanguage
     * @param string $orgContent
     * @return string
     * @throws \Exception
     */
    private function translateDescription($fromLanguage, $toLanguage, $orgContent)
    {
        $fromLanguageFull = $fromLanguage;
        $toLanguageFull = $this->getFullLanguageName($toLanguage);
        $translationPrompt = "Translate the following text from $fromLanguageFull to $toLanguageFull: " . $orgContent;
        $translationResult = Gemini::geminiPro()->generateContent($translationPrompt);

        if (isset($translationResult->candidates[0]->content->parts[0]->text)) {
            return trim(strip_tags($translationResult->candidates[0]->content->parts[0]->text));
        } else {
            throw new \Exception("Übersetzungsergebnis ist für diesen Text leer.");
        }
    }

    private function getFullLanguageName($language)
    {
        $languageNames = [
            'de' => 'german',
            'dk' => 'danish',
            'et' => 'estonian',
            'en' => 'english',
            'es' => 'spanish',
            'fi' => 'finnish',
            'fr' => 'french',
            'it' => 'italian',
            'lb' => 'luxembourgish',
            'nl' => 'dutch',
            'no' => 'norwegian',
            'pt' => 'portuguese',
            'se' => 'swedish',
        ];
        return $languageNames[$language] ?? 'unknown';
    }

    private function displayProgress($processed, $total)
    {
        $percentage = ($processed / $total) * 100;
        $this->info(sprintf("Fortschritt: %.2f%% (%d von %d)", $percentage, $processed, $total));
    }
}
