@extends('front_layout')
@section('seatreservation')
<div class="container">
  <div class="row">
    <div class="col-md-12 toppad pull-right">
      <p class="text-info">Today is: {{ date('d-m-Y H:i:s', time()) }}</p>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Bus List</h3>
        </div>
        <div class="panel-body">
        <div class="row">
          @if ( Session::has('msg') )
            <p class="alert alert-info">{{ Session::get('msg') }}</p>
            @elseif(session('success'))
            <p class="alert alert-info">{{ Session::get('success') }}</p>
          @endif
          <div class="col-md-12 col-lg-12">
              <table class="table table-user-information">
                <tbody>
                  <tr>
                    <th>Time Moving</th>
                    <th>Name of Agencies</th>
                    <th>Price</th>
                    <th>Select Seats</th>
                  </tr>
                  @if ( count($bus))
                    @foreach ( $bus as $data )
                      <tr>
                        <td>{{ $data->id }} to {{ $data->time }}</td>
                        <td>{{-- {{ $data->name }} --}}</td>
                        <td>{{-- {{ $data->description }} --}}</td>
                        <td style="text-align: center;"><form action="{{-- {{url( 'admin/locslist2/'. $data->starting_point)}} --}}" method="get"> {{ csrf_field() }}<button class="btn btn-info"> {{-- {{ $data->starting_point }} --}}</button></form></td>
                        <td style="text-align: center;"><form action="{{-- {{url( 'admin/locslist2/'. $data->destination)}} --}}" method="get"> {{ csrf_field() }}<button class="btn btn-info"> {{-- {{ $data->destination }} --}}</button></form></td>
                        <td style="text-align: center;">{{-- {{ $data->updated_at }} --}}</td>
                        <td>
                          <form action="{{-- {{url ('/admin/updatebus/' . $data->id) }} --}}" method ="post">
                            {{ csrf_field() }}
                            <button type="submit" name="submit" class="btn btn-success">Update</button>
                          </form>
                          <form action="{{-- {{ '/admin/deletebus/' . $data->id }} --}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" name="submit" value="Delete" class="btn btn-danger" />
                          </form>
                        </td>
                      </tr>
                    {{-- @endforeach
                  @endif  --}}
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
          <span class="pull-right">
            <a href="{{ url('admin/addrouterbus') }}" data-toggle="tooltip" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Add Bus</a>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
<div  class="modal-content modal-content-custom" class='showHide'>
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
				<h2> Choose seats by clicking the corresponding seat in the layout below:</h2>
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
</div>


<div>=============================</div>


@endsection
