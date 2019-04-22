@extends('users/admins/admin_layout')
@section('loginadform')

	<div class="container">
		<div class="row">
			<div class="col-lg-offset-3 col-lg-6">
				@include('errors')
				@if(session()->has('alert-success'))
		                <div class ="row">
		                	<div class = "alert alert-success">
		                		<button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;</button>
		                		<strong>Notification</strong> {{ session() -> get('alert-success') }}
		                	</div>
		                </div>
		        @elseif(session()->has('alert-danger'))
		        		<div class ="row">
		                	<div class = "alert alert-danger">
		                		<button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;</button>
		                		<strong>Notification</strong> {{ session() -> get('alert-danger') }}
		                	</div>
		                </div>
		        @elseif(session()->has('error'))
                        <p class="alert alert-info">{{ session()->get('error') }}</p>
				@endif
				<form method="post" action="/admin/login">
					@include('errors')
					{{ csrf_field() }}
					<fieldset>
						<legend>Admin Login Form</legend>
						<div class="form-group">
						  	<label for="exampleInputEmail1">Email address</label>
						  	<input name="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" type="email" required="">
						</div>
						<div class="form-group">
						  	<label for="exampleInputPassword1">Password</label>
						  	<input name="password" class="form-control" placeholder="Password" type="password" required="">
						</div>
						<button type="reset" class="btn btn-default">Reset</button>
						<button type="submit" class="btn btn-primary">Login</button>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
@endsection