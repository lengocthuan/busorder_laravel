<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Session;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest('updated_at')->paginate(20);
        return view('users/admins/users/admin_manage_user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users/admins/users/admin_add_manage_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'username' => 'unique:users,username',
            'email' => 'unique:users,email',
            'password' => 'confirmed|min:6',
        ]);

        $edit = new User;
        $edit->firstName=$request->fname;
        $edit->lastName=$request->lname;
        $edit->numPhone=$request->numphone;
        $edit->birthDay=$request->birthday;
        $edit->password= bcrypt($request->password);
        $edit->username=$request->username;
        $edit->email=$request->email;
        $edit->role_id=$request->role_id;
        $edit->save();

       return redirect()->back()->with('success','This user has added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::findOrFail($id);
        return view('users/admins/users/admin_manage_user_detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = User::findOrFail($id);
        return view('users/admins/users/admin_manage_user_update', compact('edit'));
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
        $edit = User::findOrFail($id);
        $this->validate(request(), [
            // 'username' => 'required|max:15|unique:users,username',
            // 'email' => 'required|email|unique:users,email',
            'password' => 'min:6',
        ],
        [
            // 'username.unique' => 'The usersname already exists in the system.',
            // 'email.unique' => 'The email already exists in the system.',
        ]);

        // $edit->update(array(
        //             'firstName'=>$request->fname,
        //             'lastName'=>$request->lname,
        //             'numPhone'=>$request->numphone,
        //             'birthDay'=>$request->birthday,
        //             'password'=>bcrypt($request->password)
        // ));

        $edit->firstName=$request->fname;
        $edit->lastName=$request->lname;
        $edit->numPhone=$request->numphone;
        $edit->birthDay=$request->birthday;
        $edit->password=bcrypt($request->password);
        $edit->save();

       return redirect()->back()->with('success','This user has updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->where('orders.user_id', '=', $id)
            ->get(['users.id'])->count();
        //join 3 table and count id has bus infor ordered from detail order

        if ($request->method() == "DELETE" && $user == 0) {
            // DB::table('bus_routers')->where('id', $id)->delete();
            User::where('id', $id)->delete();
            Session::flash('msg', 'Selected user has been deleted successfully');
            return redirect()->action('AdminUserController@index');
        }
        Session::flash('msg', 'This users booked one or more seat already so this user cannot be deleted right now.');
        return redirect()->action('AdminUserController@index');
    }
}
