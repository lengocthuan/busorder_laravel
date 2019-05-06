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
          <h3 class="panel-title">Manage Order</h3>
        </div>
        <div class="panel-body">
        <div class="row">
          @if ( Session::has('msg') )
            <p class="alert alert-warning">{{ Session::get('msg') }}</p>
            @elseif(session('success'))
            <p class="alert alert-danger">{{ Session::get('success') }}</p>
          @endif
          <div class="col-md-12 col-lg-12">
              <table class="table table-user-information">
                <tbody>
                  <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Total</th>
                    <th>Number of Tickets (B)</th>
                    <th>Status</th>
                    <th>Updated_at</th>
                    <th>Action</th>
                  </tr>
                  @if (count($orders))
                    @foreach ( $orders as $data )
                      <tr>
                        <td>{{ $data->id }}</td>
                        <td style="word-break: break-all;">{{ $data->user_id }}</td>
                        <td style="word-break: break-all;">{{ $data->name }}</td>
                        <td>{{ $data->total }}</td>
                        <td style="text-align: center;">{{ $data->number_tickets }}</td>
                        <td >{{ $data->status }}</td>
                        <td>{{ $data->updated_at }}</td>
                        <td>
                          <form action="{{url ('/admin/orderdetail/' . $data->id) }}" method ="get">
                            {{ csrf_field() }}
                            <button type="submit" name="submit" class="btn btn-success">Update</button>
                          </form>
                          <form action="{{ '/admin/deleteorder/' . $data->id }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" name="submit" value="Delete" class="btn btn-danger" />
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  @endif 
                  {{ $orders->links() }}
                </tbody>
              </table>
              {{ $orders->links() }}
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
          <span class="pull-right">
            <a href="{{ url('admin/addorder') }}" data-toggle="tooltip" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Add Bus</a>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection