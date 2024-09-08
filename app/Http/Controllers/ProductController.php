<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Helpers\UrlHelper;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index($locale)
    {
        // Fetch all products from the database
        $products = DB::table('product_combinations')
        ->join('products', 'product_combinations.product_id', '=', 'products.id')
        ->select('product_combinations.name', 'product_combinations.slug', 'product_combinations.total_price', 'products.type', 'products.version')
        ->get();

        // Render the index view with the products data using Inertia
        return Inertia::render('Products/Index', ['products' => $products]);
    }

    public function list($locale, $type)
    {
        $products = DB::table('product_combinations')
        ->join('products', 'product_combinations.product_id', '=', 'products.id')
        ->select('product_combinations.name', 'product_combinations.slug', 'product_combinations.total_price', 'products.type', 'products.version', 'products.weight_capacity')
        ->where('products.base_name', $type)
        ->get();

        return Inertia::render('Products/List', ['products' => $products]);
    }

    public function show($locale, $type, $version, $options = '', $slug)
    {
        // Validate URL components
        if (!UrlHelper::validateUrlComponents($locale, $type, $version, $options)) {
            abort(404);
        }

        // Retrieve the product combination by slug
        $productCombination = DB::table('product_combinations')
            ->where('slug', $slug)
            ->first();

        if (!$productCombination) {
            abort(404);
        }

        // Retrieve the product details
        $product = DB::table('products')
            ->where('id', $productCombination->product_id)
            ->first();

        // Merge the name and total_price from product_combination into the product object
        $product->name = $productCombination->name;
        $product->total_price = $productCombination->total_price;
        $product->slug = $productCombination->slug;

        return Inertia::render('Products/Show', [
            'product' => $product,
        ]);
    }

    public function generateProductPdf($locale, $slug) {

        $product = DB::table('product_combinations')
        ->join('products', 'product_combinations.product_id', '=', 'products.id')
        ->select('*')
        ->where('product_combinations.slug', $slug)
        ->get();

        $data = [
            'product' => $product[0],
            'date' => now()->format('d-m-Y'),
        ];

        $pdf = Pdf::loadView('product.pdf', $data);
        return $pdf->stream('product-' . $product[0]->slug . '.pdf');
    }


}
