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
          <h3 class="panel-title">Manage Image Bus</h3>
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
                    <th>Name</th>
                    <th>Description</th>
                    <th>Bus Infor ID</th>
                    <th>Updated_at</th>
                    <th>Action</th>
                  </tr>
                  @if (count($bus))
                    @foreach ( $bus as $data )
                      <tr>
                        <td>{{ $data->id }}</td>
                        <td style="word-break: break-all;">{{ $data->name }}</td>
                        <td>
                          <img src="{{ $data->description }}" class="img-circle" alt="Cinque Terre" width="100" height="100">
                          {{-- {{ $data->description }} --}}
                        </td>
                        <td>{{ $data->bus_information_id }}</td>
                        <td>{{ $data->updated_at }}</td>
                        <td>
                          <form action="{{url ('/admin/noti') }}" method ="get">
                            {{ csrf_field() }}
                            <button type="submit" name="submit" class="btn btn-success">Update</button>
                          </form>
                          <form action="{{url ('/admin/noti') }}" method="get">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" name="submit" value="Delete" class="btn btn-danger" />
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  @endif 
                  {{ $bus->links() }}
                </tbody>
              </table>
              {{ $bus->links() }}
            </div>

          </div>
        </div>
        <div class="panel-footer">
          <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
          <span class="pull-right">
            <a href="{{ url('admin/noti') }}" data-toggle="tooltip" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Add Image Bus</a>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection