<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use Session;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest('updated_at')->paginate(20);
        return view('users/admins/orders/admin_order', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::get();
        return view('users/admins/orders/admin_add_order', compact('user'));
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
            'name' => 'required|unique:orders,name|max:255',
        ]);

        $add = new Order;

        $add->user_id = $request->user_id;
        $add->name = $request->name;
        $add->total = $request->total;
        $add->number_tickets = $request->booked;
        $add->status = $request->status;
        $add->save();

        Session()->flash('success', 'A ticket has been successfully added to our system.');

        return redirect()->action('AdminOrderController@create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Order::findOrFail($id);
        return view('users/admins/orders/admin_order_detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $user = User::get();
        return view('users/admins/orders/admin_order_update', compact('order', 'user'));
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
        $this->validate(request(), [
            'name' => 'required|unique:orders,name|max:255',
            'status'=>'max:50',
        ]);

        $add = Order::findOrFail($id);
        $add->user_id = $request->user_id;
        $add->name = $request->name;
        $add->total = $request->total;
        $add->number_tickets = $request->booked;
        $add->status = $request->status;
        $add->save();

        Session()->flash('success', 'An order has updated successfully added to system.');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            Order::where('id', $id)->delete();
            Session::flash('msg', 'Selected order has been deleted successfully');
            return redirect()->action('AdminOrderController@index');
    }
}
