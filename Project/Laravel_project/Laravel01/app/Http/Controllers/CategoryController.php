<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\manage_category;
use App\Models\manage_product;

class CategoryController extends Controller
{
    public function showCategory()
    {
        $category = manage_category::all();
        return view('website.category', compact('category'));
    }

    public function showCategoryProducts($id)
    {
        // for dropdown in product.blade.php
        $categories = manage_category::all();

        // which category is currently selected (for filter dropdown)
        $categoryId = $id;

        // products only from this category
        // use paginate() because product.blade.php uses $products->links()
        $products = manage_product::where('cate_id', $id)->paginate(9);

        // reuse existing product view
        return view('website.product', compact('products', 'categories', 'categoryId'));
    }
}
