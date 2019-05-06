@extends('front_layout')
@section('seatreservation')
<div class="container container-custom">
  <div class="row">
    <div class="col-md-12 toppad pull-right">
      <p class="text-info">Today is: {{ date('d-m-Y H:i:s', time()) }}</p>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Bus List Activate</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            @if ( Session::has('msg') )
              <p class="alert alert-info">{{ Session::get('msg') }}</p>
              @elseif(Session('success'))
              <p class="alert alert-info">{{ Session::get('success') }}</p>
              @elseif(Session('fail'))
              <p class="alert alert-warning">{{ Session::get('fail') }}</p>
            @endif
            <div class="col-md-12 col-lg-12">
                <table class="table table-user-information">
                  <tbody>
                    <tr>
                      <th>ID</th>
                      <th>Time Moving</th>
                      <th>Route</th>
                      <th>Bus_Info</th>
                      <th>Select Seats</th>
                      <th>Action</th>
                    </tr>
                        @foreach($time as $t)
                        <form form action="{{url ('/customer/booking/' . $loop->index) }}" method ="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <tr>
                            <td>
                              {{ $loop->index+1 }} 
                            </td>
                              <td style="word-break: break-all;">
                                <div>From {{ $t->time_start }}</div>
                              </br>
                                <div>to {{ $t->time_end }}</div>
                              </td>
                          <td style="word-break: break-all;"><a href="{{ url('/location') }}">From {{ $t->starting_point }} </br> to {{ $t->destination }}</a></td>
                          <td ><input readonly name="bus_id" id="bus_id" value="{{ $t->id }}"></td>
                          <td style="word-break: break-all;">
                            <div class="form-group">
                              <img  class= "resize" src="images/seat.png" class="img-rounded" alt="seat">
                            </div>
                          </br>
                              <div class="form-group">
                                <label class="col-lg-3 control-label" style="max-width: 30%;">Number of Seats</label>
                                <div class="col-lg-8">
                                  <select name="nseats" class="form-control" id="nseats" required>
                                    <option>-- Select number of seats must be less than or equal to 5--</option>
                                    @for($i=1; $i<= 5; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                    </select>
                                </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-lg-3 control-label" style="max-width: 30%;">Input detail seats:</label>
                                  <div class="col-lg-8">
                                    <input class="form-control" type="text" value="" required="" name="dseats" placeholder="sample:(1, 2) " pattern="^[0-9,]*">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-lg-3 control-label" style="max-width: 30%;">Price of a seat: </label>
                                  <div class="col-lg-8">
                                    <input class="form-control" type="number" name="price" readonly value="{{ $t->price }}" >
                                  </div>
                              </div>

                          </td>
                          <input type="hidden" name="name" id="" value="Order of {{ Auth::user()->username }} : {{ $loop->index }}">
                          <input type="hidden" name="status" id="" value="unpaid">
                          {{-- <input type="hidden" name="total" id="" value="10">
                          <input type="hidden" name="number_tickets" id="" value="1"> --}}

                          <td>
                            {{-- <form action="{{url ('/customer/booking/' . $loop->index) }}" method ="post">
                            {{ csrf_field() }} --}}
                              <button type="submit" name="submit" class="btn btn-primary">Book</button>
                            {{-- </form> --}}
                          </td>
                        </tr>
                        </form>
                      @endforeach
 {{--                    @endif  --}}
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>




{{-- <div  class="modal-content modal-content-custom" class='showHide'>
    <input type="checkbox" id="toggle" />
    <label for="toggle">
        <span class="expand">
        	<span class="changeArrow arrow-dn"><i class="fas fa-plus-circle"></i></span>
        	<span class="changeArrow arrow-up"><i class="fas fa-minus-square"></i></span>
            <h2> Choose seats by clicking the corresponding seat in the layout below:</h2>
        </span>
    </label>
    <div class="fieldsetContainer">
        <fieldset id="fdstLorem">
            <div class="modal-content modal-content-custom1">
			    <div id="holder">
			        <ul  id="place">
			        </ul>
			    </div>
			    <div style="float:left;">
			    <ul id="seatDescription">
			        <li style="background:url('images/available_seat_img.gif') no-repeat scroll 0 0 transparent;">Available Seat</li>
			        <li style="background:url('images/booked_seat_img.gif') no-repeat scroll 0 0 transparent;">Booked Seat</li>
			        <li style="background:url('images/selected_seat_img.gif') no-repeat scroll 0 0 transparent;">Selected Seat</li>
			    </ul>
			    </div>
			        <div style="clear:both;width:100%">
			        <input type="button" id="btnShowNew" value="Show Selected Seats" />
			        <input type="button" id="btnShow" value="Show All" />
			        </div>
			</div>
        </fieldset>
    </div>
</div> --}}
@endsection
