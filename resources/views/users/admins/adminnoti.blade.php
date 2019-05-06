@extends('users/admins/admin_layout')
@section('content')
    <div class="container container-custom">
    <div class="container mt-5">
        <div class="title">
          <h3>Notifications</h3>
        </div>
    </div>
    <div class="alert alert-warning">
         <div class="container">
             <div class="alert-icon">
                <i class="material-icons">warning</i>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="material-icons">Close</i></span>
            </button>
             <b>Warning Alert:</b> We are sorry. This feature is being developed, please come back next time.
        </div>
    </div>
    <div class="alert alert-success">
        <a href="{{ url('/admin/dashboard') }}">Back To Home</a>
    </div>
@endsection