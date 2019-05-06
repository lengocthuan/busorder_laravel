@extends('users/admins/admin_layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 toppad pull-right">
      <p class="text-info">Today is: {{ date('d-m-Y H:i:s', time()) }}</p>
    </div>
    @include('errors')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Update for location {{ $edit->name }}</h3>
        </div>
        <div class="panel-body">
        <div class="row">
          @if ( Session::has('success') )
            <p class="alert alert-success">{{ Session::get('success') }}</p>
          @endif
          <form method="post" action="{{ url('admin/locationdetail/'. $edit->id) }}">
            {{ csrf_field() }}
            <div class="col-md-12 col-lg-12"> 
                  <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="input name: Đà Nẵng" value="{{ $edit->name }}" required="" />
                        <label>Description</label>
                        <textarea class="form-control" name="description" placeholder="input description" value="{{ $edit->description }}" required="">{{ $edit->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="reset" class="btn btn-default">Cancel</button>
            </div>
          </form>
          
          </div>
        </div>
        <div class="panel-footer">
          <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
          <span class="pull-right">
            <a href="{{ url('admin/locslist') }}" data-toggle="tooltip" type="button" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection