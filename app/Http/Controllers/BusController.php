<?php

namespace App\Http\Controllers;

use App\BusRouter;
use Illuminate\Http\Request;
use DB;
use App\Location;
use App\BusInformation;
use Session;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bus = BusRouter::get();
        return view('users/admins/admin_bus_list', compact('bus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $location = Location::orderBy('id', 'DESC')->get()->first();
        return view('users/admins/admin_add_bus',compact('location'));
        
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
            'name' => 'required|max:15|unique:bus_routers,name',
        ],
        [
            'name.required' => 'Please input : starting_point - destination',
        ]);

        $add = new BusRouter;

        $add->name = $request->name;
        $add->description = $request->description;
        $add->starting_point = $request->starting_point;
        $add->destination = $request->destination;
        $add->save();

        session()->flash('alert-success', 'A router bus has been successfully added to our system.');

        return redirect()->action('BusController@create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showDetailLocation($id)
    {
        // echo $id;
        $detail = Location::find($id);
        return view('users.admins.admin_detail_loc', compact('detail'));
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
    public function showUpdate($id)
    {
        $edit = BusRouter::findOrFail($id);
        $location = Location::orderBy('id', 'DESC')->get()->first();
        return view('users/admins/admin_update_buslist', compact('edit', 'location'));
    }

    public function update(Request $request, $id)
    {
        $edit = BusRouter::findOrFail($id); 
        $edit->touch();
        $edit->update(array(
                    'name'=>$request->name,
                    'description'=>$request->descript,
                    'starting_point'=>$request->starting,
                    'destination'=>$request->destination
        ));
       return redirect()->action('BusController@index')->with('success','Bus Router has updated successfully');
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

    public function deleteBus(Request $request, $id)
    {
        $busy = DB::table('bus_routers')
            ->join('bus_informations', 'bus_informations.bus_router_id', '=', 'bus_routers.id')
            ->join('detail_order_bus_infomation', 'detail_order_bus_infomation.bus_information_id', '=', 'bus_informations.id')
            ->where('bus_routers.id', '=', $id)
            ->get(['bus_routers.id'])->count();
        //join 3 table and count id has bus infor ordered from detail order
        if ($request->method() == "DELETE" && $busy == 0) {
            DB::table('bus_routers')->where('id', $id)->delete();
            Session::flash('msg', 'Selected Bus has been deleted successfully');
            return redirect()->action('BusController@index');
        }
        Session::flash('msg', 'One of a customer booked one or more seat already so this bus cannot be deleted right now.');
        return redirect()->action('BusController@index');
    }

    public function showLocation()
    {
        $locs = Location::get();
        return view('users/admins/admin_bus_location', compact('locs'));
    }
}
