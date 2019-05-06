@extends('front_layout')
@section('editprofile')

<div class="container container-custom">
    <h1>Edit Profile</h1>
    <hr>
  <form action="{{ url('/edited/'. $user->id) }}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
          <div class="text-center">
            @if (is_null($imgs))
            <img  src="http://lorempixel.com/100/100" class="avatar img-circle" alt="avatar" class="img-circle img-responsive">
            @else
            <img src="{{ url('upload/'.$imgs->description) }}" class="img-circle" alt="Cinque Terre" width="100" height="100">
            @endif
            <h6>Upload a different photo...</h6>
            <input type="file" class="form-control" accept=".png, .jpg, .jpeg" name="image" required="">
            <input type="hidden" name="avatar" id="" value="avatar">
            <input type="hidden" name="bus_id" id="" value="1">
            <input type="hidden" name="tick_id" id="" value="1">
            <input type="hidden" name="user_id" id="" value="121">
          </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
          <div class="row">
            @if ( Session::has('msg') )
              <p class="alert alert-info">{{ Session::get('msg') }}</p>
              @elseif(Session('success'))
              <p class="alert alert-info">{{ Session::get('success') }}</p>
            @endif
          </div>
          <h3>Personal info</h3>
          <form class="form-horizontal" role="form">
            <div class="form-group">
              <label class="col-lg-3 control-label">First name:</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" value="{{ $user->firstName }}" required="" name="fname">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Last name:</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" value="{{ $user->lastName }}" required="" name="lname">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Numberphone:</label>
              <div class="col-lg-8">
                <input class="form-control" value= "{{ $user->numPhone }}" required="" type="tel" name="numphone" pattern="[0-9]{2}-[0-9]{3}-[0-9]{3}-[0-9]{4}" required placeholder="Format: 84-012-345-6789">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Birthday:</label>
              <div class="col-lg-8">
                <input class="form-control" value="{{ $user->birthDay }}" type="date" name="birthday" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Email:</label>
              <div class="col-lg-8">
                <input class="form-control" value="{{ Auth::user()->email }}" type="email" readonly="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Username:</label>
              <div class="col-md-8">
                <input class="form-control" type="text" value="{{ Auth::user()->username }}" readonly="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Password:</label>
              <div class="col-md-8">
                <input class="form-control" type="password" value="" >
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Confirm password:</label>
              <div class="col-md-8">
                <input class="form-control" type="password" value="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label"></label>
              <div class="col-md-8">
                <button type="submit" class="btn btn-success">Save Changes</button>
                <span></span>
                <input type="reset" class="btn btn-default" value="Cancel">
              </div>
            </div>
          </form>
        </div>
    </div>
  </form>
</div>
<hr>
@endsection