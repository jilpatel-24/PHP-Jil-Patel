<?php

namespace App\Http\Controllers;

use App\Models\manage_product;
use Illuminate\Http\Request;
use App\Models\manage_category;
use RealRashid\SweetAlert\Facades\Alert;

class ManageProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.add_product');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $cate_arr = manage_category::all();



        return view('admin.add_product', compact('cate_arr'));
        //return view('admin.add_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = new manage_product();
        $data->product_name = $request->product_name;
        $data->product_description = $request->product_description;
        $data->product_price = $request->product_price;
        $data->cate_id = $request->cate_id;

        $product_img = $request->file('product_img');  // image get
        $filename = time() . '_img.' . $request->file('product_img')->getClientOriginalExtension(); // name set
        $product_img->move('upload/product', $filename); // move in public folder
        $data->product_img = $filename; // store in name in database

        $data->save();
        //return redirect('/add_product');
        return redirect('/add_product')->with('success', 'Product added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(manage_product $manage_product)
    {
        $data = manage_product::with('category')->get();
        return view('admin.manage_product', ["manage_product" => $data]);


        //$data = manage_product::all();
        //return view('admin.manage_product', ["manage_product" => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(manage_product $manage_product, $id)
    {
        $manage_product = manage_product::findOrFail($id);
        $cate_arr = manage_category::all();

        return view('admin.edit_product', compact('manage_product', 'cate_arr'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, manage_product $manage_product, $id)
    {
        $data = manage_product::find($id);

        $data->product_name = $request->product_name;
        $data->product_description = $request->product_description;
        $data->product_price = $request->product_price;
        $data->cate_id = $request->cate_id;

        if ($request->hasFile('product_img')) {
            unlink('upload/product/' . $data->product_img); //This is Delete Old Image

            $product_img = $request->file('product_img');  // image get
            $filename = time() . '_img.' . $request->file('product_img')->getClientOriginalExtension(); // name set
            $product_img->move('upload/product', $filename); // move in public folder
            $data->product_img = $filename; // store in name in database
        }
        $data->save();
        Alert::success('Success', 'Your Product Update Successfully');
        return redirect('/manage_product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(manage_product $manage_product, $id)
    {
        $data = manage_product::find($id);
        $del_data = $data->product_name;
        $data->delete();
        return back()->with('delete', $del_data);
    }
}
