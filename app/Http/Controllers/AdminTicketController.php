<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use DB;
use App\Location;
use App\BusInformation;
use Session;

class AdminTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::latest('updated_at')->paginate(20);
        return view('users/admins/tickets/admin_ticket',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $location = Location::get();
        return view('users/admins/tickets/admin_add_ticket',compact('location'));
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
            'timestart' => 'after:timeallow',
            'timeend' => 'after:timestart',
            'description'=>'max:255',
        ]);

        $add = new Ticket;

        $add->name = $request->name;
        $add->description = $request->description;
        $add->price = $request->price;
        $add->time_allow_order = $request->timeallow;
        $add->time_start = $request->timestart;
        $add->time_end = $request->timeend;
        $add->number_of_tickets = $request->notickets;
        $add->save();

        Session()->flash('success', 'A ticket has been successfully added to our system.');

        return redirect()->action('AdminTicketController@create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Ticket::findOrFail($id);
        return view('users/admins/tickets/admin_ticket_detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $bus = DB::table('tickets')
        //     ->join('bus_informations', 'bus_informations.ticket_id', '=', 'tickets.id')
        //     ->where('bus_informations.ticket_id', '=', $id)
        //     ->get(['bus_informations.number_seats'])->first();
        $edit = Ticket::findOrFail($id);
        return view('users/admins/tickets/admin_ticket_update', compact('edit', 'bus'));

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
            'timestart' => 'after:timeallow',
            'timeend' => 'after:timestart',
            'description'=>'max:255',
        ]);

        $add = Ticket::findOrFail($id);

        $add->name = $request->name;
        $add->description = $request->description;
        $add->price = $request->price;
        $add->time_allow_order = $request->timeallow;
        $add->time_start = $request->timestart;
        $add->time_end = $request->timeend;
        $add->number_of_tickets = $request->notickets;
        $add->save();

        Session()->flash('success', 'A ticket has updated successfully added to our system.');

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
        $ticket =  DB::table('tickets')
            ->join('bus_informations', 'bus_informations.ticket_id', '=', 'tickets.id')
            ->join('detail_order_bus_infomation', 'bus_informations.id', '=', 'detail_order_bus_infomation.bus_information_id')
            ->where('bus_informations.ticket_id', '=', $id)
            ->get(['tickets.id'])->count();

        if ($request->method() == "DELETE" && $ticket == 0) {
            // DB::table('bus_routers')->where('id', $id)->delete();
            Ticket::where('id', $id)->delete();
            Session::flash('msg', 'Selected ticket has been deleted successfully');
            return redirect()->action('AdminTicketController@index');
        }
        Session::flash('msg', 'This ticket booked one or more seat already so this ticket cannot be deleted right now.');
        return redirect()->action('AdminTicketController@index');
    }
}
