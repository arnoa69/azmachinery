<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateProductPdfTranslations extends Command
{
    protected $signature = 'generate:product-pdf-translations';
    protected $description = 'Kopiere Produktbeschreibungen aus JSON-Dateien in die productDescription.php Dateien für Übersetzungen';

    public function handle()
    {
        // Liste der Sprachen
        $languages = ['de', 'dk', 'et', 'en', 'es', 'fi', 'fr', 'it', 'lb', 'nl', 'no', 'pt', 'se'];
        $country = env('VITE_APP_COUNTRY', 'azmch'); // 'default_country' is a fallback value
        // Basis-Pfad zu den JSON-Dateien
        $jsonBasePath = resource_path('js/locales/' . $country . '/products');

        // Iteriere über jede Sprache
        foreach ($languages as $language) {
            $jsonFilePath = "{$jsonBasePath}/{$language}.json";
            $phpFilePath = base_path("lang/{$language}/productDescription.php"); // Pfad zu productDescription.php

            // Überprüfen, ob die JSON-Datei existiert
            if (!File::exists($jsonFilePath)) {
                $this->error("Die Datei {$jsonFilePath} existiert nicht.");
                continue;
            }

            // JSON-Daten laden
            $jsonData = json_decode(File::get($jsonFilePath), true);
            // PHP-Datei laden oder erstellen
            $phpData = [];
            if (File::exists($phpFilePath)) {
                $phpData = include $phpFilePath; // Bestehenden Inhalt laden
            }

            // Füge die Produktbeschreibungen aus der JSON-Datei hinzu
            foreach ($jsonData as $slug => $item) {
                $phpData[$slug] = [
                    'product_description' => $item['product_description'] ?? '',
                ];
            }

            // Speichere die aktualisierte PHP-Datei
            $this->savePhpFile($phpFilePath, $phpData);
            $this->info("Produktübersetzungen für {$language} wurden erfolgreich aktualisiert.");
        }
    }

    private function savePhpFile($filePath, $data)
    {
        // Lade den bestehenden Inhalt der PHP-Datei, wenn sie existiert
        $existingData = File::exists($filePath) ? include $filePath : [];

        // Füge die neuen Produktbeschreibungen hinzu
        foreach ($data as $key => $value) {
            $existingData[$key] = $value;
        }

        // Erstelle den neuen Inhalt der PHP-Datei
        $content = "<?php\n\nreturn [\n";
        // Füge die bestehenden Daten hinzu
        foreach ($existingData as $key => $value) {
            // Überprüfe, ob es sich um ein Array handelt
            if (is_array($value)) {
                $content .= "    '{$key}' => " . var_export($value, true) . ",\n";
            } else {
                $content .= "    '{$key}' => '{$value}',\n";
            }
        }
        // Schließe das Array
        $content .= "];\n";

        // Speichere den Inhalt in die Datei
        File::put($filePath, $content);
    }
}
