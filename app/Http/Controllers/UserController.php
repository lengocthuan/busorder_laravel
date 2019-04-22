<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Image;
use Session;
use Auth;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //create join two table;
        // $roles = DB::table('users')
        //     ->join('role_users', 'role_users.user_id', '=', 'users.id')
        //     ->where('users.email', '=', $email)
        //     ->get();
        //dd($roles)
        $user = User::find($id);
        $imgs = DB::table('users')
                            ->join('images', 'images.user_id', '=', 'users.id')
                            ->where('images.user_id', '=', $user)
                            ->get('images.description');

        // dd($imgs);
        // if($imgs -> isEmpty()) {
        //     echo 'trong';
        // }
        // else  echo 'khong trong';
        // if($imgs ->isEmpty()) {
        //     return
        // }

        return view('edit_profile',compact('user','imgs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create($id)
    // {
    //     $user = User::find($id);
    //     // dd($user);
    //     return view('edit_profile',compact('user'));
    // }

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
        // $imgs = Image::get();
        
        $user = User::get();
        $user->touch();
        $user->update(array(
                    'fname'=>$request->firstName,
                    'lname'=>$request->lastName,
                    'numphone'=>$request->numPhone,
                    'birthday'=>$request->birthDay
        ));
       return redirect()->action('UserController@index')->with('success','You have successfully changed your account information');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
