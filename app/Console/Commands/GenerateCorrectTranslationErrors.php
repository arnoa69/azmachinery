<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Gemini\Laravel\Facades\Gemini;

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
        $country = env('VITE_APP_COUNTRY', 'azmch');
        $validLanguages = ['de', 'dk', 'et', 'en', 'es', 'fi', 'fr', 'it', 'lb', 'nl', 'no', 'pt', 'se'];

        if (!in_array($language, $validLanguages)) {
            $this->error("Die angegebene Sprache '$language' ist nicht gültig.");
            return;
        }

        $langFilePath = resource_path("js/locales/{$country}/products/{$language}.json");
        if (!File::exists($langFilePath)) {
            $this->error("Die Datei für die Sprache '{$language}' existiert nicht.");
            return;
        }

        $langData = json_decode(File::get($langFilePath), true);
        $totalProducts = count($langData);
        $processedProducts = $this->getLastProcessedIndex($country,$language); // Lade den letzten bearbeiteten Index

        foreach ($langData as $slug => $content) {
            if ($processedProducts > 0) {
                $processedProducts--;
                continue; // Überspringe bereits bearbeitete Produkte
            }

            if (isset($content['product_description'])) {
                $currentDescription = $content['product_description'];
                $detectedLanguage = $this->detectLanguage($currentDescription);

                if ($detectedLanguage['code'] !== $language) {
                    $this->info("Übersetzung für '{$slug}' ist nicht '{$language}'. Korrigiere...");
                    $correctedDescription = $this->translateDescription($detectedLanguage['name'], $language, $currentDescription);
                    $langData[$slug]['product_description'] = $correctedDescription;
                    $this->info("Korrigierte Beschreibung für '{$slug}': {$correctedDescription}");
                }
            }

            File::put($langFilePath, json_encode($langData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            $processedProducts++;
            $this->saveLastProcessedIndex($country,$language, $slug); // Speichere den letzten bearbeiteten Index
            $this->displayProgress($processedProducts, $totalProducts);
        }

        $this->info("Die Übersetzungen für die Sprache '{$language}' wurden erfolgreich korrigiert.");
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

    private function detectLanguage($text)
    {
        // Hier wird die Sprache des Textes erkannt
        $detectionPrompt = "Detect the language of the following text: " . $text;
        $detectionResult = Gemini::geminiPro()->generateContent($detectionPrompt);

        if (isset($detectionResult->candidates[0]->content->parts[0]->text)) {
            $detectedLanguage = trim(strip_tags($detectionResult->candidates[0]->content->parts[0]->text));
            // Mapping von den ausgeschriebenen Namen auf die Kürzel
            $languageMapping = [
                'German' => 'de',
                'Danish' => 'dk',
                'Estonian' => 'et',
                'English' => 'en',
                'Spanish' => 'es',
                'Finnish' => 'fi',
                'French' => 'fr',
                'Italian' => 'it',
                'Luxembourgish' => 'lb',
                'Dutch' => 'nl',
                'Norwegian' => 'no',
                'Portuguese' => 'pt',
                'Swedish' => 'se',
            ];

            // Überprüfen, ob die erkannte Sprache im Mapping vorhanden ist
            if (array_key_exists($detectedLanguage, $languageMapping)) {
                return [
                    'code' => $languageMapping[$detectedLanguage],
                    'name' => $detectedLanguage
                ];
            } else {
                dd($detectedLanguage);
                throw new \Exception("Die erkannte Sprache '{$detectedLanguage}' ist nicht gültig.");
            }
        } else {
            throw new \Exception("Die Spracherkennung für diesen Text ist fehlgeschlagen.");
        }
    }

    private function translateDescription($fromLanguage, $toLanguage, $orgContent)
    {
        $fromLanguageFull = $this->getFullLanguageName($fromLanguage);
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
