<?php
namespace App\Http\Controllers;

use App\Models\Customer;         // your customer model
use App\Models\manage_product;   // your product model (if needed)
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        // load customers (for the dropdown)
        $customers = Customer::orderBy('name')->get();

        // build cart info from session
        $cart = session('cart', []);
        $productIds = array_keys($cart);
        $products = manage_product::whereIn('id', $productIds)->get()->keyBy('id');

        $subtotal = 0;
        foreach ($cart as $pid => $item) {
            $price = isset($item['price']) ? (float)$item['price'] : 0;
            $qty = isset($item['qty']) ? (int)$item['qty'] : (isset($item['quantity']) ? (int)$item['quantity'] : 1);
            $subtotal += $price * $qty;
        }
        $shipping = 0;
        $tax = $subtotal * 0.05;
        $total = $subtotal + $shipping + $tax;

        return view('website.checkout', compact('customers','cart','products','productIds','subtotal','shipping','tax','total'));
    }
}
