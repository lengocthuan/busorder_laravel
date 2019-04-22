@extends('front_layout')
@section('editprofile')

<div class="container container-custom">
    <h1>Edit Profile</h1>
    <hr>
  <div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          @if ( $imgs -> isEmpty() )
          {{-- <img src="{{ $imgs->description }}" class="avatar img-circle" alt="avatar"> --}} {{-- {{ $imgs->description }} --}}
          <img  src="http://lorempixel.com/100/100" class="avatar img-circle" alt="avatar" class="img-circle img-responsive">
          @else
          <img src="/images/{{ $imgs->user_id }}" class="img-circle img-responsive">
          @endif
          <h6>Upload a different photo...</h6>
          <input type="file" class="form-control" accept=".png, .jpg, .jpeg">
        </div>
      </div>

{{--       <div class="col-md-3 col-lg-3" align="center">
              @if ( $imgs -> isEmpty() ) 
                <img  src="http://lorempixel.com/100/100" class="avatar img-circle" alt="avatar" class="img-circle img-responsive">
              @else
                <img src="/images/profile/{{ $imgs->user_id }}" class="img-circle img-responsive" >
              @endif
              <input type="file" name="pp" value="Upload Photo">
      </div>
       --}}
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
              <input class="form-control" type="text" value="" required="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="" required="">
            </div>
          </div>
          {{-- <div class="form-group">
            <label class="col-lg-3 control-label">Company:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="">
            </div>
          </div> --}}
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" value="{{ Auth::user()->email }}" type="email" readonly="">
            </div>
          </div>
          {{-- <div class="form-group">
            <label class="col-lg-3 control-label">Time Zone:</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select id="user_time_zone" class="form-control">
                  <option value="Hawaii">(GMT-10:00) Hawaii</option>
                  <option value="Alaska">(GMT-09:00) Alaska</option>
                  <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                  <option value="Arizona">(GMT-07:00) Arizona</option>
                  <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                  <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
                  <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                  <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                </select>
              </div>
            </div>
          </div> --}}
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
              <a href = "{{ url('/edited/'. $user->id) }}"><input type="button" class="btn btn-primary" value="Save Changes"></a>
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
@endsection