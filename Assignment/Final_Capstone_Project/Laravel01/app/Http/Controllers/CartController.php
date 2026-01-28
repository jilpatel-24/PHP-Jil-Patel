<?php

namespace App\Http\Controllers;

use App\Models\manage_product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Add product to cart (session).
     * Expects route: POST /cart/add/{id}
     */
    public function add(Request $request, $id)
    {
        $product = manage_product::findOrFail($id);

        $cart = session()->get('cart', []);

        // sanitize & enforce minimum quantity from request
        $incomingQty = (int) $request->input('quantity', 1);
        if ($incomingQty < 1) {
            $incomingQty = 1;
        }

        $key = (string) $id; // ensure string key for session array consistency

        if (isset($cart[$key])) {
            // read existing qty defensively (support 'qty' or older 'quantity' keys)
            $existingQty = 0;
            if (isset($cart[$key]['qty'])) {
                $existingQty = (int) $cart[$key]['qty'];
            } elseif (isset($cart[$key]['quantity'])) {
                $existingQty = (int) $cart[$key]['quantity'];
            }

            $cart[$key]['qty'] = $existingQty + $incomingQty;
        } else {
            $cart[$key] = [
                'id'    => (int) $id,
                'name'  => $product->product_name,
                'price' => (float) $product->product_price,
                'image' => $product->product_img,
                'qty'   => $incomingQty,
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Item added to cart!');
    }

    /**
     * Show cart page.
     * NOTE: view file is resources/views/website/cart.blade.php
     */
    public function index()
    {
        $cart = session()->get('cart', []);

        // calculate subtotal using 'qty'
        $subtotal = 0;
        foreach ($cart as $item) {
            $itemQty = isset($item['qty']) ? (int) $item['qty'] : (isset($item['quantity']) ? (int)$item['quantity'] : 0);
            $subtotal += ($item['price'] * $itemQty);
        }

        // example shipping (you can compute actual shipping rules)
        $shipping = 0;
        $taxRate = 0.05; // 5% example
        $tax = $subtotal * $taxRate;
        $total = $subtotal + $shipping + $tax;

        return view('website.cart', compact('cart', 'subtotal', 'shipping', 'tax', 'total'));
    }

    /**
     * Update quantities.
     *
     * This method supports two forms:
     * 1) Single-item update (as your Blade view uses):
     *    PATCH /cart/update/{id} with input: 'qty'
     *
     * 2) Bulk update (legacy or alternative):
     *    PATCH /cart/update with input: 'quantities' => [id => qty, ...]
     */
    public function update(Request $request, $id = null)
    {
        $cart = session()->get('cart', []);

        // Bulk update if 'quantities' array is supplied
        if ($request->has('quantities') && is_array($request->input('quantities'))) {
            $input = $request->input('quantities', []);
            foreach ($input as $pid => $qty) {
                $pid = (string) $pid;
                $qty = (int) $qty;
                if (!isset($cart[$pid])) {
                    continue;
                }
                if ($qty > 0) {
                    $cart[$pid]['qty'] = $qty;
                } else {
                    unset($cart[$pid]);
                }
            }

            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'Cart updated.');
        }

        // Single-item update (the view sends 'qty' and route param id)
        if ($id !== null) {
            $pid = (string) $id;
            if (!isset($cart[$pid])) {
                return redirect()->route('cart.index')->with('error', 'Item not found in cart.');
            }

            $qty = (int) $request->input('qty', 1);
            if ($qty > 0) {
                $cart[$pid]['qty'] = $qty;
            } else {
                unset($cart[$pid]);
            }

            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'Cart updated.');
        }

        // Nothing to do
        return redirect()->route('cart.index')->with('error', 'Invalid update request.');
    }

    /**
     * Remove a single item from cart.
     * Expects route: DELETE /cart/remove/{id}
     */
    public function remove(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        $pid = (string) $id;

        if (isset($cart[$pid])) {
            unset($cart[$pid]);
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
        }

        return redirect()->route('cart.index')->with('error', 'Item not found in cart.');
    }

    /**
     * Clear entire cart.
     * Expects route: DELETE /cart/clear
     */
    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Cart cleared.');
    }
}
