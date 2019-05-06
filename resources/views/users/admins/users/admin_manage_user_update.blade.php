@extends('users/admins/admin_layout')
@section('admin_manage_user_update')
<div class="container">
  <div class="row">
    
    <div class="col-md-12 toppad pull-right">
      <p class="text-info">Today is: {{ date('d-m-Y H:i:s', time()) }}</p>
    </div>
    @include('errors')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Update for user {{ $edit->username }}</h3>
        </div>
        <div class="panel-body">
        <div class="row">
          @if ( Session::has('success') )
            <p class="alert alert-success">{{ Session::get('success') }}</p>
          @endif
          <div class="col-md-12 col-lg-12">
              <table class="table table-user-information">
                <form action="{{ url ('admin/manageuserdetail/' . $edit->id) }}" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                          <div class="form-group">
                            <label class="col-lg-3 control-label">First name:</label>
                            <div class="col-lg-8">
                              <input class="form-control" type="text" value="{{ $edit->firstName }}" required="" name="fname">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Last name:</label>
                            <div class="col-lg-8">
                              <input class="form-control" type="text" value="{{ $edit->lastName }}" required="" name="lname">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Numberphone:</label>
                            <div class="col-lg-8">
                              <input class="form-control" value= "{{ $edit->numPhone }}" required="" type="tel" name="numphone" pattern="[0-9]{2}-[0-9]{3}-[0-9]{3}-[0-9]{4}" required placeholder="Format: 84-012-345-6789">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Birthday:</label>
                            <div class="col-lg-8">
                              <input class="form-control" value="{{ $edit->birthDay }}" type="date" name="birthday" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-8">
                              <input class="form-control" value="{{ $edit->email }}" type="email" readonly="" name="email">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-3 control-label">Username:</label>
                            <div class="col-md-8">
                              <input class="form-control" type="text" value="{{ $edit->username }}" readonly="" name="username">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-3 control-label">Password:</label>
                            <div class="col-md-8">
                              <input class="form-control" type="password" value="{{ $edit->password }}" name="password">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-3 control-label">Confirm password:</label>
                            <div class="col-md-8">
                              <input class="form-control" type="password" value="" name="password_confirmation">
                            </div>
                          </div>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <input type="reset" class="btn btn-default" value="Cancel">
               </form>
              </table>

{{--               <table class="table table-user-information">
                <form action="{{ url ('admin/manageuserdetail/' . $edit->id) }}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>First name:</label>
                        <input class="form-control" type="text" name="fname" placeholder="input first name" value="{{ $edit->firstName }}" required="" />
                        <label>Last name:</label>
                        <input class="form-control" name="lname" placeholder="input last name" value="{{ $edit->lastName }}" required="" />
                        <label>Numberphone:</label>
                        <input class="form-control" value= "{{ $edit->numPhone }}" required="" type="tel" name="numphone" pattern="[0-9]{2}-[0-9]{3}-[0-9]{3}-[0-9]{4}" required placeholder="Format: 84-012-345-6789">
                        <label>Birthday:</label>
                        <input class="form-control" name="birthday" placeholder="input birthday" type="date" value="{{$edit->birthDay}}" required=""/>
                        <label>Username:</label>
                        <input class="form-control" name="username" placeholder="input user name" value="{{ $edit->username }}" readonly=""/>
                        <label>Email:</label>
                        <input class="form-control" name="email" placeholder="input email" value="{{ $edit->email }}" readonly=""/>
                        <label>Password:</label>
                        <input class="form-control" type="password" name="password" placeholder="input password" value="{{ $edit->password }}"/>
                        <label>Confirm password:</label>
                        <input class="form-control" type="password" value="" name="password_confirmation">
                    <div class="form-group" class="col-md-8">
                      <input type="reset" class="btn btn-default" value="Cancel">
                      <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
              </table> --}}
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