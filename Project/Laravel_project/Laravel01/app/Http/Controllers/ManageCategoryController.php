<?php

namespace App\Http\Controllers;

use App\Models\manage_category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ManageCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.add_category');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = new manage_category();
        $data->cate_name = $request->cate_name;

        $cate_img = $request->file('cate_img');  // image get
        $filename = time() . '_img.' . $request->file('cate_img')->getClientOriginalExtension(); // name set
        $cate_img->move('upload/category', $filename); // move in public folder
        $data->cate_img = $filename; // store in name in database

        $data->save();
        return back()->with('success', 'Category Added successfully!');

        //return redirect('/add_category');

    }


    /**
     * Display the specified resource.
     */
    public function show(manage_category $manage_category)
    {
        $data = manage_category::all();
        return view('admin.manage_category', ["manage_category" => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(manage_category $manage_category, $id)
    {
        $manage_category = manage_category::findOrFail($id);
        return view('admin.edit_category', compact('manage_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, manage_category $manage_category, $id)
    {
        $data = manage_category::find($id);

        $data->cate_name = $request->cate_name;

        if ($request->hasFile('cate_img')) {
            unlink('upload/category/' . $data->cate_img); //This is Delete Old Image

            $cate_img = $request->file('cate_img');  // image get
            $filename = time() . '_img.' . $request->file('cate_img')->getClientOriginalExtension(); // name set
            $cate_img->move('upload/category', $filename); // move in public folder
            $data->cate_img = $filename; // store in name in database
        }
        $data->save();
        Alert::success('Success', 'Your Catagory Update Successfully');
        return redirect('/manage_category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(manage_category $manage_category, $id)
    {
        $data = manage_category::find($id);
        $del_data = $data->cate_name;
        $data->delete();
        return back()->with('delete', $del_data);
    }
}
