@extends('users/admins/admin_layout')
@section('admin_bus_list_detail')
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
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Starting_Point</th>
                    <th>Destination</th>
                    <th>Update_at</th>
                    <th>Action</th>
                  </tr>
                      <tr>
                        <td>{{ $bus->id }}</td>
                        <td>{{ $bus->name }}</td>
                        <td>{{ $bus->description }}</td>
                        <td style="text-align: center;"><form action="{{url( 'admin/locslist2/'. $bus->starting_point)}}" method="get"> {{ csrf_field() }}<button class="btn btn-info"> {{ $bus->starting_point }}</button></form></td>
                        <td style="text-align: center;"><form action="{{url( 'admin/locslist2/'. $bus->destination)}}" method="get"> {{ csrf_field() }}<button class="btn btn-info"> {{ $bus->destination }}</button></form></td>
                        <td style="text-align: center;">{{ $bus->updated_at }}</td>
                        <td>
                          <form action="{{url ('/admin/updatebus/' . $bus->id) }}" method ="post">
                            {{ csrf_field() }}
                            <button type="submit" name="submit" class="btn btn-success">Update</button>
                          </form>
                          <form action="{{ '/admin/deletebus/' . $bus->id }}" method="post">
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
            <a href="{{ url('admin/routerlist') }}" data-toggle="tooltip" type="button" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            <a href="{{ url('admin/addrouterbus') }}" data-toggle="tooltip" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Add Bus</a>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection