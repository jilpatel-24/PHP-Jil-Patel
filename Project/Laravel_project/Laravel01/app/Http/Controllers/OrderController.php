<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\manage_product;
use App\Models\order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('website.checkout', ['orders' => $orders]);
        //return view('website.checkout');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('website.checkout');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $data = $request->validate([
        'cust_name' => 'required|integer|exists:customers,id', // require a valid customer id
        'p_name'    => 'required|string',                     // CSV of product ids
        't_price'   => 'required|numeric',
        'Address'   => 'required|string|max:2000',
        'city'      => 'required|string|max:150',
        'state'     => 'required|string|max:150',
        'pincode'   => 'required|string|max:20',
    ]);

    // create order — store ids (cust_name and p_name contain ids)
    $order = \App\Models\Order::create([
        'cust_name' => (int)$data['cust_name'],   // store customer id
        'p_name'    => $data['p_name'],           // store product ids (CSV)
        't_price'   => $data['t_price'],
        'Address'   => $data['Address'],
        'city'      => $data['city'],
        'state'     => $data['state'],
        'pincode'   => $data['pincode'],
    ]);

    session()->forget('cart');

    return redirect()->route('products.index')->with('success', 'Order placed. ID: '.$order->id);
}




    /**
     * Display the specified resource.
     */
    public function show(order $order, $id)
    {
        //$data=order::all();
        //return view('admin.manage_order',["order"=>$data]);

        $order = Order::findOrFail($id);
        return view('admin.view_order', ['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, order $order, $id)
    {
        $order = Order::findOrFail($id);

        $data = $request->validate([
            'p_name'    => 'sometimes|string|max:2000',
            'cust_name' => 'sometimes|string|max:150',
            't_price'   => 'sometimes|numeric',
            'Address'   => 'sometimes|string|max:2000',
            'city'      => 'sometimes|string|max:150',
            'state'     => 'sometimes|string|max:150',
            'pincode'   => 'sometimes|string|max:20',
        ]);

        $order->update($data);

        return back()->with('success', 'Order updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(order $order, $id)
    {
        $data = order::find($id);
        $del_data = $data->name;
        $data->delete();
        return back()->with('delete', $del_data);
    }
}
