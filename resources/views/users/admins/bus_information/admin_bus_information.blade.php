@extends('users/admins/admin_layout')
@section('content')
<div class="container">
  <div class="row">
    
    <div class="col-md-12 toppad pull-right">
      <p class="text-info">Today is: {{ date('d-m-Y H:i:s', time()) }}</p>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Bus Information</h3>
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
                    <th>ID</th>
                    <th>Bus_Router_ID</th>
                    <th>Driver_ID</th>
                    <th>Ticket_Control</th>
                    <th>Accompanied_Service</th>
                    <th style="text-align: center;">Status</th>
                    <th>Number_Seats</th>
                    <th>User_ID</th>
                    <th>Ticket_ID</th>
                    <th style="text-align: center;">Update_at</th>
                    <th>Action</th>
                  </tr>
                  @if (count($businfo))
                    @foreach ( $businfo as $data )
                      <tr>
                        <td>{{ $data->id }}</td>
                        <td style="text-align: center;"><form action="{{url( 'admin/routerlist/'. $data->bus_router_id)}}" method="get"> {{ csrf_field() }}<button class="btn btn-info"> {{ $data->bus_router_id }}</button></form></td>
                        <td>{{ $data->driver_id }}</td>
                        <td>{{ $data->ticket_control }}</td>
                        <td>{{ $data->accompanied_service }}</td>
                        <td style="text-align: center;">{{ $data->status }}</td>
                        <td>{{ $data->number_seats }}</td>
                        <td style="text-align: center;"><form action="{{url( 'admin/manageuser/'. $data->user_id)}}" method="get"> {{ csrf_field() }}<button class="btn btn-info"> {{ $data->user_id }}</button></form></td>
                        <td style="text-align: center;"><form action="{{url( 'admin/ticket/'. $data->ticket_id)}}" method="get"> {{ csrf_field() }}<button class="btn btn-info"> {{ $data->ticket_id }}</button></form></td>
                        <td>{{ $data->updated_at }}</td>
                        <td>
                          <form action="{{url ('admin/updatebusinfo/' . $data->id) }}" method ="get">
                            {{ csrf_field() }}
                            <button type="submit" name="submit" class="btn btn-success">Update</button>
                          </form>
                          <form action="{{ '/admin/deletebusinfo/' . $data->id }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" name="submit" value="Delete" class="btn btn-danger" />
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  @endif 
                  {{ $businfo->links() }}
                </tbody>
              </table>
              {{ $businfo->links() }}
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
          <span class="pull-right">
            <a href="{{ url('admin/addbusinfo') }}" data-toggle="tooltip" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Add Bus</a>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection