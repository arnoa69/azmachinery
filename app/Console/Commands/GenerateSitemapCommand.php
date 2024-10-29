<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Helpers\UrlHelper;

class GenerateSitemapCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates separate sitemap files for each locale.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $country = config('app.country');
        $domain = '';
        switch ($country) {
            case 'azmch':
                $domain = "https://az-machinery.ch";
                break;
            case 'azmbe':
                $domain = "https://az-machinery.be";
                break;
            case 'azmit':
                $domain = "https://az-machinery.it";
                break;
            case 'azmnl':
                $domain = "https://az-machinery.nl";
                break;
            case 'azmde':
                $domain = "https://az-machinery.de";
                break;
            default:
                $domain = "https://az-machinery.be";
                break;
        }
        $locales = config('app.available_locales'); // Adjust based on your available locales
        $sitemaps = [];

        foreach ($locales as $locale) {
            $sitemapContent = $this->generateSitemapForLocale($locale, $domain);
            $sitemaps[] = $locale; // Store the locale for main sitemap generation
            // Save individual sitemap file for each locale
            file_put_contents("public/sitemap_{$locale}.xml", $sitemapContent);
        }

        // Generate the main sitemap.xml that references all individual sitemaps
        $this->generateMainSitemap($sitemaps);
        $this->info('Sitemaps generated successfully!');
        return 0;
    }

    private function generateSitemapForLocale($locale, $domain)
    {
        $priority_1 = 1.00;
        $priority_64 = 0.64;
        $lastModified = Carbon::now()->toIso8601String();

        // Add XML header and opening urlset tag
        $content = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
        $content .= "<urlset\n";
        $content .= " xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"\n";
        $content .= " xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"\n";
        $content .= " xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9\n";
        $content .= " http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">\n";

        // Fetch product data using DB facade with join
        $products = DB::table('products')
            ->join('product_combinations', 'products.id', '=', 'product_combinations.product_id')
            ->select('products.*', 'product_combinations.slug as combination_slug')
            ->get();

        // Add homepage to sitemap
        $content .= "<url>\n";
        $content .= " <loc>$domain</loc>\n";
        $content .= " <lastmod>$lastModified</lastmod>\n";
        $content .= " <priority>$priority_1</priority>\n";
        $content .= "</url>\n";

        // Logic to process and use product data
        foreach ($products as $product) {
            $type = $product->type;
            $version = $product->version;
            $slug = $product->combination_slug;

            // Debugging-Ausgabe
            //$this->info("Slug: $slug, Type: $type, Version: $version");

            // Überprüfen Sie die Typ- und Versionsvalidierung
            if (!$type || !$version) {
                throw new \Exception('Invalid type or version in product: ' . json_encode($product));
            }

            $url = $domain . '/' . $locale . UrlHelper::generateSitemapUrl($slug, $type, $version, $locale);
            $content .= "<url>\n";
            $content .= " <loc>$url</loc>\n";
            $content .= " <lastmod>$lastModified</lastmod>\n";
            $content .= " <priority>$priority_64</priority>\n";
            $content .= "</url>\n";

            // Generate URL for PDF
            $pdfUrl = $domain . '/' . $locale . '/pdf' . UrlHelper::generateSitemapUrl($slug, $type, $version, $locale);
            $content .= "<url>\n";
            $content .= " <loc>$pdfUrl</loc>\n";
            $content .= " <lastmod>$lastModified</lastmod>\n";
            $content .= " <priority>$priority_64</priority>\n";
            $content .= "</url>\n";
        }

        $content .= "</urlset>\n";
        return $content;
    }

    private function generateMainSitemap($sitemaps)
    {
        $mainContent = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
        $mainContent .= "<sitemapindex xmlns=\"http://www.sitemaps.org/schemas/sitemap-image/1.0\">\n";

        foreach ($sitemaps as $locale) {
            $mainContent .= "<sitemap>\n";
            $mainContent .= " <loc>https://az-machinery.ch/public/sitemap_{$locale}.xml</loc>\n";
            $mainContent .= " <lastmod>" . Carbon::now()->toIso8601String() . "</lastmod>\n";
            $mainContent .= "</sitemap>\n";
        }

        $mainContent .= "</sitemapindex>\n";

        // Save the main sitemap.xml
        file_put_contents('public/sitemap.xml', $mainContent);
    }
}
