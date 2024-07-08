<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        // Fetch all products from the database
        $products = Product::all();

        // Render the index view with the products data using Inertia
        return Inertia::render('Products/Index', ['products' => $products]);
    }

    public function show($locale, $slug)
    {
        //app()->setLocale($locale);
        \Log::info("Received request for locale: $locale, slug: $slug");
        $query = Product::where('slug', $slug);

        if ($locale !== 'en') {
            $query->orWhere("slug_{$locale}", $slug);
        }

        $product = $query->firstOrFail();

        // Get all slugs for this product
        $slugs = [];
        foreach (config('app.available_locales') as $loc) {
            if ($loc === 'en') {
                $slugs[$loc] = $product->slug;
            } else {
                $slugs[$loc] = $product["slug_{$loc}"] ?? $product->slug;
            }
        }

        return Inertia::render('Products/Show', [
            'product' => $product,
            'slugs' => $slugs
        ]);
    }

    public function generateProductPdf($locale, $slug) {
        // $product = Product::where('slug', $slug)->firstOrFail();
        $query = Product::where('slug', $slug);

        if ($locale !== 'en') {
            $query->orWhere("slug_{$locale}", $slug);
        }

        $product = $query->firstOrFail();

        $data = [
            'item' => compact('product'),
            'date' => now()->format('d-m-Y'),
        ];

        $pdf = Pdf::loadView('product.pdf', $data);
        return $pdf->stream('product-' . $product->product_code . '.pdf');
    }
}
