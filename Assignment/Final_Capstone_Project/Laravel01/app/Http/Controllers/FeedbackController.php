<?php

namespace App\Http\Controllers;

use App\Models\feedback;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('website.feedback');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('website.feedback');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|regex:/^[A-Za-z ]+$/|max:255',
            'comment' => 'required'
        ]);
        $data=new feedback();
        $data->name=$request->name;
        $data->comment=$request->comment;
        $data->save();
        //return back()->with('success', 'Thank you for your feedback!');
        //return redirect('/feedback');

        Alert::success('Success', 'Your Feedback Sent Successfully'); //This is Sweet-Alert
        return redirect('/feedback');
    }

    /**
     * Display the specified resource.
     */
    public function show(feedback $feedback)
    {
        $data=feedback::all(); 
        return view('admin.manage_feedback',["feedback"=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(feedback $feedback,$id)
    {
        $data=feedback::find($id);
        $del_data=$data->name;
        $data->delete();
        return back()->with('delete', $del_data);
    }
}
