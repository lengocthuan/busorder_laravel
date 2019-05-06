@extends('users/admins/admin_layout')
@section('admin_dashboard')
<div class="container">
  <div class="row">
    
    <div class="col-md-5 toppad pull-right col-md-offset-3">
      <a href="{{ url('/updateinfo/'. Auth::user()->id) }}">Edit Profile</a>
      <br>
      <p class="text-info">Today is: {{ date('d-m-Y H:i:s', time()) }}</p>
    </div>
    {{-- <div class="panel-body">
                    <a href="{{url('admin/dashboard')}}">Admin</a>
    </div> --}}
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">{{ Auth::user()->username }}</h3>
        </div>
        <div class="panel-body">
        <div class="row">
          <div class="col-md-3 col-lg-3" align="center">
              <img alt="User Pic" src="{{ url('images/admin.png') }}" class="img-circle img-responsive">
            {{-- @if (is_null($imgs))
            <img  src="http://lorempixel.com/100/100" class="avatar img-circle" alt="avatar" class="img-circle img-responsive">
            @else
            <img src="{{ url('upload/'.$imgs->description) }}" class="img-circle" alt="Cinque Terre" width="100" height="100"> --}}
            {{-- @endif --}}
          </div>
            <div class="col-md-12 col-lg-12"> 
              <table class="table table-user-information">
                <tbody>
                </tbody>
              </table>
              
              <a href="{{ url('admin/noti') }}" class="btn btn-primary">Customer statistics</a>
              <a href="{{ url('admin/noti') }}" class="btn btn-primary">Agency statistics</a>
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
          <span class="pull-right">
            <a href="{{ url('admin/noti') }}" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection