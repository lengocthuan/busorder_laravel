@extends('users/admins/admin_layout')
@section('admin_add_location')
<div class="container">
  <div class="row">
    @include('errors')
    <div class="col-md-5 toppad pull-right">
          <p class="text-info">Today is: {{ date('d-m-Y H:i:s', time()) }}</p>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Add new location</h3>
        </div>
        <div class="panel-body">
        <div class="row">
        
          @if ( Session::has('alert-success') )
            <p class="alert alert-info">{{ Session::get('alert-success') }}</p>
          @endif

          <form method="post" action="{{ url('admin/addlocations') }}">
            {{ csrf_field() }}
            <div class="col-md-12 col-lg-12"> 
                  <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="input name: Đà Nẵng" value="" required="" />
                        <label>Description</label>
                        <textarea class="form-control" name="description" placeholder="input description" value="" required=""></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Add</button>
            </div>
          </form>
          
          </div>
        </div>
        <div class="panel-footer">
          <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
          <span class="pull-right">
            <a href="{{ url('admin/locslist') }}" data-toggle="tooltip" type="button" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
           {{--  <a href="{{ url('admin/addbus') }}" data-toggle="tooltip" type="button" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i> Add</a> --}}
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
