@extends('front_layout')
@section('content')
<div class="container container-custom">
  <div class="row">
    <div class="col-md-12 toppad pull-right">
      <p class="text-info">Today is: {{ date('d-m-Y H:i:s', time()) }}</p>
    </div>
    @include('errors')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Detail Order: {{ Auth::user()->username }}</h3>
        </div>
    <div class="panel-body">
        <div class="row">
          @if ( Session::has('msg') )
            <p class="alert alert-warning">{{ Session::get('msg') }}</p>
            @elseif(session('success'))
            <p class="alert alert-success">{{ Session::get('success') }}</p>
          @endif
          <div class="col-md-12 col-lg-12">
              <table class="table table-user-information">
                <tbody>
                  <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Number of Tickets (B)</th>
                    <th>Total</th>
                    <th>Status </th>
                    <th>Action</th>
                  </tr>
                      <tr>
                        <td>{{ $data->id }}</td>
                        <td >{{ $data->user_id }}</td>
                        <td >{{ $data->name }}</td>
                        <td>{{ $data->number_of_tickets }}</td>
                        <td>{{ $data->total }}</td>
                        <td >{{ $data->status }}</td>
                        <td>
                          <form action="{{url ('/noti') }}" >
                            {{ csrf_field() }}
                            <button type="submit" name="submit" class="btn btn-success">Update</button>
                          </form>
                          <form action="{{ '/noti' }}" >
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
        <div class="panel-footer">
          {{-- <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i></a> --}}
          {{-- <span class="pull-right">
            <a href="{{ url('admin/order') }}" data-toggle="tooltip" type="button" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
          </span> --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection