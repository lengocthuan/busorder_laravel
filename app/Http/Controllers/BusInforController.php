<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusInformation;
use App\BusRouter;
use App\Ticket;
use App\User;
use DB;
use Session;

class BusInforController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businfo = BusInformation::latest('updated_at')->paginate(15);
        return view('users/admins/bus_information/admin_bus_information', compact('businfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bus = BusRouter::get();
        $max = Ticket::max('number_of_tickets');
        $ticket = Ticket::get();
        $user = User::get();
        return view('users/admins/bus_information/admin_add_bus_information', compact('bus', 'ticket', 'user', 'max'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $add = new BusInformation;

        $add->bus_router_id = $request->brouter;
        $add->status = $request->status;
        $add->number_seats = $request->nseats;
        $add->user_id = $request->user_id;
        $add->ticket_id = $request->ticket_id;

        $add->save();

        Session()->flash('success', 'A bus information has been successfully added to system.');

        return redirect()->action('BusInforController@create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bus = BusRouter::get();
        $ticket = Ticket::get();
        $user = User::get();
        $businfo = BusInformation::findOrFail($id);
        return view('users/admins/bus_information/admin_bus_information_update', compact('bus', 'ticket', 'user', 'businfo'));
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
            'drive' => 'max:255',
            'tcontrol' => 'max:255',
            'aservice' => 'max:255',
        ]);

        $add = BusInformation::findOrFail($id);

        $add->bus_router_id = $request->brouter;
        $add->status = $request->status;
        $add->number_seats = $request->nseats;
        $add->user_id = $request->user_id;
        $add->ticket_id = $request->ticket_id;
        $add->save();

        Session()->flash('success', 'An bus information has updated successfully added to system.');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $busy = DB::table('bus_informations')
            ->join('detail_order_bus_infomation', 'detail_order_bus_infomation.bus_information_id', '=', 'bus_informations.id')
            ->where('bus_informations.id', '=', $id)
            ->get(['bus_informations.id'])->count();
        //join 3 table and count id has bus infor ordered from detail order
        if ($request->method() == 'DELETE' && $busy == 0) {
            DB::table('bus_informations')->where('id', $id)->delete();
            Session::flash('msg', 'Selected Bus information has been deleted successfully');
            return redirect()->action('BusInforController@index');
        }
        Session::flash('msg', 'One of a customer booked one or more seat already so this bus cannot be deleted right now.');
        return redirect()->action('BusInforController@index');
    }
}
