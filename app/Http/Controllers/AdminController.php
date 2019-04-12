<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('adminauth');
    // }

    public function index()
    {
        return view('users/admins/admin_dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Auth::logout();
        //session()->flash('alert-success', 'Login successful');
        return redirect()->action('AdminController@adloginform');
    }

    public function adloginform()
    {
        if (Auth::check()) {
            return redirect()->action('AdminController@index');
        } else {
            return view('users/admins/admin_login');
        }
        
    }

    public function adminlogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        //create join two table;
        // $roles = DB::table('users')
        //     ->join('role_users', 'role_users.user_id', '=', 'users.id')
        //     ->where('users.email', '=', $email)
        //     ->get();
        //dd($roles)
        if (Auth::attempt(['email' => $email, 'password' => $password, 'role_id' => '1'])) {
            session()->flash('alert-success', 'Login successful');
            return redirect()->action('AdminController@index');
            } else {
                session()->flash('alert-danger', 'Login failed');
                return redirect()->action('AdminController@adloginform');
            }
    }
}
