<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->cookie('c_email')) {
            $c_email = $request->cookie('c_email');
            $c_pass = $request->cookie('c_pass');
            $cookie = array("c_email" => $c_email, "c_pass" => $c_pass); //Cookie Value Store in Array
        }
        $cookie[] = ""; //If Cookie not set then empty value store in Array
        return view('admin.admin_login', ["cookie" => $cookie]);
    }

    public function admin_auth_login(Request $request)
    {
        $validation = $request->validate([
            'email' => 'required|email',
            'pass' => 'required|min:4|max:12'
        ]);

        $data = admin::where('email', $request->email)->first(); //This Check Email
        if ($data) {
            if (Hash::check($request->pass, $data->pass)) //This Check Password
            {
                // session create
                Session()->put('aemail', $data->email);  // $_SESSION['cname']=$data->name
                Session()->put('aid', $data->id);

                if (isset($request->rem)) {
                    Cookie::queue('c_email',  $request->email, 10); //Cookie Create
                    Cookie::queue('c_pass',  $request->pass, 10);
                }

                Alert::success('Congrats', 'Admin Login Successfully'); //This is Sweet-Alert
                return redirect('/dashboard');
            } else {
                Alert::error('Failed', 'Login Failed due to wrong password');
                return redirect('/admin_login');
            }
        } else {
            Alert::error('Failed', 'Login Failed due wrong email');
            return redirect('/admin_login');
        }
    }

    public function admin_logout()
    {

        Session()->pull('aemail');
        Session()->pull('aid');

        Alert::success('Success', 'Admin Logout Successfully');
        return redirect('/admin_login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin_login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin $admin)
    {
        //
    }
}
