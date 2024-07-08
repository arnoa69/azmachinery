<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
         // Render the index view with the products data using Inertia
        return Inertia::render('Categories/Index');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Inertia\Response
     */
    public function show($locale,$type)
    {
        if($type === 'mobile') {
            $type = 'mobile_ramp';
        } elseif($type === 'static') {
            $type = 'fix_ramp';
        } elseif($type === 'station') {
            $type = 'platform';
        }

        // Fetch the product from the database based on the slug
        $products = Product::where('type', $type)->get();

        // Render the show view with the product data using Inertia
        return Inertia::render('Categories/Show', ['products' => $products]);
    }
}
