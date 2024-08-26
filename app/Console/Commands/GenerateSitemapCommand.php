<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Carbon\Carbon;

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
    protected $description = 'Generates a file with product data as a sitemap.';

    /**
     * Execute the console command.
     *
     * @return int
     */

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $domain = "https://rampas-carga-moviles.es";
        $locales = config('app.available_locales'); // Adjust based on your available locales
        $priority_1 = 1.00;
        $priority_08 = 0.80;
        $priority_64 = 0.64;

        $changefreq = 'daily';

        $content = '';
        // Add XML header and opening urlset tag
        $content = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
        $content .= "<urlset\n";
        $content .= "  xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"\n";
        $content .= "  xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"\n";
        $content .= "  xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9\n";
        $content .= "            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">\n";

        // Fetch product data using DB facade
        $products = DB::table('products')->get();

        $content .= "<url>\n";
        $content .= "  <loc>$domain</loc>\n";
        $lastModified = Carbon::now()->toIso8601String();
        $content .= "  <lastmod>$lastModified</lastmod>\n";
        $content .= "  <priority>$priority_1</priority>\n";
        $content .= "</url>\n";

        foreach ($locales as $locale) {
            $productListingUrlsAdded = false;
            if (!$productListingUrlsAdded) {
                $content .= "<url>\n";
                $loc = $domain . '/' . $locale . '/products';
                $content .= "  <loc>$loc</loc>\n";
                $lastModified = Carbon::now()->toIso8601String();
                $content .= "  <lastmod>$lastModified</lastmod>\n";
                $content .= "  <priority>$priority_08</priority>\n";
                $content .= "</url>\n";

                $productListingUrlsAdded = true;
            }
        }
        foreach ($locales as $locale) {
            $productCategoryUrlsAdded = false;
            if (!$productCategoryUrlsAdded) {
                $content .= "<url>\n";
                $loc = $domain . '/' . $locale . '/categories';
                $content .= "  <loc>$loc</loc>\n";
                $lastModified = Carbon::now()->toIso8601String();
                $content .= "  <lastmod>$lastModified</lastmod>\n";
                $content .= "  <priority>$priority_08</priority>\n";
                $content .= "</url>\n";

                $productCategoryUrlsAdded = true;
            }
        }

        // Logic to process and use product data
        foreach ($products as $product) {
            foreach ($locales as $locale) {
                // Generate URL for product page
                $content .= "<url>\n";
                $loc = $domain . '/' . $locale . '/products/' . (($locale === 'en') ? $product->slug : $product->{'slug_' . $locale});
                $content .= "  <loc>$loc</loc>\n";
                $content .= "  <lastmod>$lastModified</lastmod>\n";
                $content .= "  <priority>$priority_64</priority>\n";
                $content .= "</url>\n";

                // Generate URL for PDF
                $content .= "<url>\n";
                $loc = $domain . '/' . $locale . '/products/' . (($locale === 'en') ? $product->slug : $product->{'slug_' . $locale}) . '/pdf';
                $content .= "  <loc>$loc</loc>\n";
                $content .= "  <lastmod>$lastModified</lastmod>\n";
                $content .= "  <priority>$priority_64</priority>\n";
                $content .= "</url>\n";
            }
        }
        $content .= "</urlset>\n";

        // Generate the file (replace with your desired logic)
        file_put_contents('public/sitemap.xml', $content);

        $this->info('File generated successfully!');

        return 0;
    }
}
