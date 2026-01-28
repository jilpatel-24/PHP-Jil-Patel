<?php

namespace App\Http\Controllers;

use App\Mail\contactmail;
use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('website.contectus');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('website.contectus');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // create validation Rule 
        $validation=$request->validate([
            'name' => 'required|regex:/^[A-Za-z ]+$/|max:255',
            'email' => 'required|:contacts',
            'comment' => 'required'
        ]);

        $data=new contact;
    $name=$data->name=$request->name;
    $email=$data->email=$request->email;
        $data->comment=$request->comment;
        $data->save();

        $data=array("name"=>$name,"email"=>$email);
        Mail::to($email)->send(new contactmail($data));

        Alert::success('Congrats', 'You\'ve Inquiry Successfully Registered');
        return back(); 

        //return redirect('/contectus');
    }

    /**
     * Display the specified resource.
     */
    public function show(contact $contact)
    {
        $data=contact::all();
        return view('admin.manage_contact',["contact"=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(contact $contact,$id)
    {
        $data=contact::find($id);
        $del_data=$data->name;
        $data->delete();
        return back()->with('delete', $del_data);
    }
}
