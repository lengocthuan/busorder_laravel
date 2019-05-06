@extends('users/admins/admin_layout')
@section('admin_ticket_detail')
<div class="container">
  <div class="row">
    
    <div class="col-md-12 toppad pull-right">
      <p class="text-info">Today is: {{ date('d-m-Y H:i:s', time()) }}</p>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Detail Ticket: {{ $data->name }}</h3>
        </div>
        <div class="panel-body">
        <div class="row">
          @if ( Session::has('msg') )
            <p class="alert alert-info">{{ Session::get('msg') }}</p>
            @elseif(Session('success'))
            <p class="alert alert-info">{{ Session::get('success') }}</p>
          @endif
          <div class="col-md-12 col-lg-12">
              <table class="table table-user-information">
                <tbody>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Time Allow Order</th>
                    <th>Time Start</th>
                    <th>Time End</th>
                    <th>Num of Tickets</th>
                    <th>Updated_at</th>
                    <th>Action</th>
                  </tr>
                      <tr>
                        <td>{{ $data->id }}</td>
                        <td style="word-break: break-all;">{{ $data->name }}</td>
                        <td style="word-break: break-all;">{{ $data->description }}</td>
                        <td>{{ $data->price }}</td>
                        <td >{{ $data->time_allow_order }}</td>
                        <td >{{ $data->time_start }}</td>
                        <td>{{ $data->time_end }}</td>
                        <td>{{ $data->number_of_tickets }}</td>
                        <td>{{ $data->updated_at }}</td>
                        <td>
                          <form action="{{url ('/admin/ticketdetail/' . $data->id) }}" method ="get">
                            {{ csrf_field() }}
                            <button type="submit" name="submit" class="btn btn-success">Update</button>
                          </form>
                          <form action="{{ '/admin/deleteticket/' . $data->id }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" name="submit" value="Delete" class="btn btn-danger" />
                          </form>
                        </td>
                      </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
          <span class="pull-right">
            <a href="{{ url('admin/ticket') }}" data-toggle="tooltip" type="button" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection