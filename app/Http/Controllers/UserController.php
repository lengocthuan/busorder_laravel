<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Image;
use Session;
use Auth;
use DB;
use App\Ticket;
use App\BusInformation;
use App\BusRouter;
use Carbon\Carbon;
use App\Order;
use App\DetailOrderBusInfomation;
use App\Location;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::findOrFail($id);
        $imgs = Image::where('user_id', $id )->get()->last();

        //join db check description and use isEmpty() check data when it return to []
        // $img1s = DB::table('users')
        //                     ->join('images', 'images.user_id', '=', 'users.id')
        //                     ->where('images.user_id', '=', $user)
        //                     ->get('images.description');
        // dd($imgs);
        // if($imgs -> isEmpty()) {
        //     echo 'trong';
        // }
        // else  echo 'khong trong';
        // if($imgs ->isEmpty()) {
        //     return
        // }

        return view('edit_profile',compact('imgs', 'user'));
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
        $user = User::findOrFail($id);
        $imgs = DB::table('users')
                            ->join('images', 'images.user_id', '=', 'users.id')
                            ->where('images.user_id', '=', $user)
                            ->get('images.description');
        if($imgs -> isEmpty()) {
            $imgs = new Image;
            $imgs->name =  $request->avatar;
            $imgs->bus_information_id =  $request->bus_id;
            $imgs->ticket_id =  $request->tick_id;
            $imgs->user_id =  $id;

            if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move('upload', $name);
            $imgs->description = $name;
            
        }
        // $imgs->save();

            // $imageName = time().'_'.request()->image->getClientOriginalExtension();
            // request()->image->move(public_path("images/user/"), $imageName);
        }
        $imgs->save();
        
        // $user = User::get();
        // $user->touch();
        //$user = User::find($id);
        $user->firstName=$request->fname;
        $user->lastName=$request->lname;
        $user->numPhone=$request->numphone;
        $user->birthDay=$request->birthday;
        $user->save();

       return redirect()->back()->with('success','You have just updated the information successfully.');
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

    public function seatReservation()
    {
        $bus = BusInformation::get();
        $router = BusRouter::get();
        $ticket = Ticket::get();
        $data = Order::get();
        $time = DB::table('tickets')
                            ->join('bus_informations', 'tickets.id', '=', 'bus_informations.ticket_id')
                            ->join('bus_routers', 'bus_routers.id', '=', 'bus_informations.bus_router_id')
                            ->get(['tickets.time_start', 'tickets.time_end', 'bus_routers.starting_point', 'bus_routers.destination','tickets.price', 'bus_informations.id']);
        // dd($time);

        return view('seat_reservation',compact('bus', 'ticket', 'router','time', 'data'));
    }

    public function detailBooking(Request $request, $id)
    {
        $add = new Order;

        $add->user_id = Auth::user()->id;
        $add->name = $request->name;
        $add->number_tickets = $request->nseats;
        $add->total = $request->nseats*$request->price;
        $add->status = $request->status;
        



        $add1 = new DetailOrderBusInfomation;
        $add1->order_id = Order::orderBy('updated_at', 'desc')->first()->id;
        $add1->bus_information_id = $request->bus_id;
        $add1->name = $request->name;
        $add1->description = $request->status;
        $add1->seat = $request->dseats;
        $add1->price = $request->nseats*$request->price;


        // dd($add1);
        if(count(( explode( ',', $add1->seat ))) == $add->number_tickets) 
        {
            $add->save(); 
            $add1->save();
            Session()->flash('success', 'You have successfully booked your seats, please check the information below.');

            $data = Order::findOrFail($id);
            return view('detail_booking_customer', compact('data'));
            //return back();
        }
        else return back()->with('fail', 'Please check information again before booking.');
        // dd(count(( explode( ',', $add1->seat ))));
        //;


        
    }

    public function updateBooking($id)
    {
        $data = Order::findOrFail($id);
        return view('detail_booking_customer', compact('data'));
    }

    public function timeMoving($id)
    {
        $time = Ticket::find($id);
        
        //dd($time);
       $start = Carbon::parse($time->time_start);
        $end = Carbon::parse($time->time_end);
        $hours = $end->diffInHours($start);
        $mins = $end->diffInRealMinutes($start);
        $secs = $end->diffInRealSeconds($start);

        $minsreal = $mins - $hours*60;


        //return $hours."hours". $minsreal."minutes";
        //var_dump($time->time_start) ;
        return view('seat_reservation',compact('hours', 'minreal'));
    }

    public function showLocation()
    {
        $locs = Location::latest('updated_at')->paginate(20);
        return view('location', compact('locs'));
    }
}
