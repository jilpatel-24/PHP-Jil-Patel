<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\manage_category;
use App\Models\manage_product;

class WebsiteProductController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->query('category');

        $query = manage_product::with('category');

        if (!empty($categoryId)) {
            $query->where('cate_id', $categoryId); // change if needed
        }

        $products = $query->paginate(12)->withQueryString();
        $categories = manage_category::all();

        return view('website.product', compact('products', 'categories', 'categoryId'));
    }

    public function show($id)
    {
        $product = manage_product::with('category')->findOrFail($id);

        return view('website.product_detail', compact('product'));
    }
}
