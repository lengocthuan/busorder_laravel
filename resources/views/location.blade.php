@extends('front_layout')
@section('content')
<div class="container container-custom">
  <div class="row">
    <div class="col-md-12 toppad pull-right">
      <p class="text-info">Today is: {{ date('d-m-Y H:i:s', time()) }}</p>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Bus Location</h3>
        </div>
        <div class="panel-body">
        <div class="row">
          @if ( Session::has('msg') )
            <p class="alert alert-info">{{ Session::get('msg') }}</p>
          @endif

          <div class="col-md-12 col-lg-12">
              <table class="table table-user-information">
                <tbody>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                  </tr>
                  @if ( count($locs))
                    @foreach ( $locs as $data )
                      <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->description }}</td>
                      </tr>
                    @endforeach
                  @endif 
                  {{ $locs->links() }}
                </tbody>
              </table>
              {{ $locs->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection