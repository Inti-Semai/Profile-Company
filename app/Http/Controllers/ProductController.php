<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CompanySetting;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $setting = CompanySetting::first();
        $products = Product::orderBy('order')->get();
        $landing = \App\Models\ProductLanding::first();
        return view('landing.products', compact('setting', 'products', 'landing'));
    }

    public function show($id)
    {
        $setting = CompanySetting::first();
        $product = Product::findOrFail($id);
        $specifications = $product->specification;
        $landing = \App\Models\ProductLanding::first();
        return view('landing.product-detail', compact('setting', 'product', 'specifications', 'landing'));
    }

    public function english()
    {
        $setting = CompanySetting::first();
        $products = Product::orderBy('order')->get();
        $landing = \App\Models\ProductLanding::first();
        return view('landing.en.products', compact('setting', 'products', 'landing'));
    }

    public function showEnglish($id)
    {
    $setting = CompanySetting::first();
    $product = Product::findOrFail($id);
    $landing = \App\Models\ProductLanding::first();
    $specifications_en = $product->specifications_en ?? '';
    return view('landing.en.product_detailen', compact('setting', 'product', 'landing', 'specifications_en'));
    }
}