@extends('users/admins/admin_layout')
@section('admin_manage_user_add')
<div class="container">
  <div class="row">
    
    <div class="col-md-12 toppad pull-right">
      <p class="text-info">Today is: {{ date('d-m-Y H:i:s', time()) }}</p>
    </div>
    @include('errors')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title"> Add user </h3>
        </div>
        <div class="panel-body">
        <div class="row">
          @if ( Session::has('success') )
            <p class="alert alert-success">{{ Session::get('success') }}</p>
          @endif
          <div class="col-md-12 col-lg-12">
              <table class="table table-user-information">
                <form action="{{ url ('admin/addmanageuser') }}" method="post" >
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                          <div class="form-group">
                            <label class="col-lg-3 control-label">First name:</label>
                            <div class="col-lg-8">
                              <input class="form-control" type="text" value="" required="" name="fname">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Last name:</label>
                            <div class="col-lg-8">
                              <input class="form-control" type="text" value="" required="" name="lname">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Numberphone:</label>
                            <div class="col-lg-8">
                              <input class="form-control" value= "" required="" type="tel" name="numphone" pattern="[0-9]{2}-[0-9]{3}-[0-9]{3}-[0-9]{4}" required placeholder="Format: 84-012-345-6789">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Birthday:</label>
                            <div class="col-lg-8">
                              <input class="form-control" value="" type="date" name="birthday" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-8">
                              <input class="form-control" value="" type="email" required="" name="email">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-3 control-label">Username:</label>
                            <div class="col-md-8">
                              <input class="form-control" type="text" value="" required="" name="username">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-3 control-label">Password:</label>
                            <div class="col-md-8">
                              <input class="form-control" type="password" value="" name="password">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-3 control-label">Confirm password:</label>
                            <div class="col-md-8">
                              <input class="form-control" type="password" value="" name="password_confirmation">
                            </div>
                          </div>
                          <input type="hidden" name="role_id" id="" value="0">
                    </div>
                    <button type="submit" class="btn btn-success" style="width: 69.59px;">Add</button>
                    <input type="reset" class="btn btn-default" value="Cancel">
               </form>
              </table>
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
          <span class="pull-right">
            <a href="{{ url('admin/manageuser') }}" data-toggle="tooltip" type="button" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection