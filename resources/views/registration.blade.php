	@extends('front_layout')
	@section('registration')
	 <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                	@include('errors')
                	@if(session()->has('alert-success'))
		                <div class ="row">
		                	<div class = "alert alert-success">
		                		<button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;</button>
		                		<strong>Notification</strong> {{ session() -> get('alert-success') }}
		                	</div>
		                </div>
					@endif
                    <form action="/register" method="POST">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Username</label>
                                <input type="text" class="form-control border" placeholder=" " name="username" id="recipient-rname" required="">
                            </div>
                            <div class="form-group">
                                <label for="recipient-email" class="col-form-label">Email</label>
                                <input type="email" class="form-control border" placeholder=" " name="email" id="email123" required="" value="">
                            </div>
                            <div class="form-group">
                                <label for="password1" class="col-form-label">Password</label>
                                <input type="password" class="form-control border" placeholder=" " name="password" id="password1" required="">
                            </div>
                            <div class="form-group">
                                <label for="password2" class="col-form-label">Confirm Password</label>
                                <input type="password" class="form-control border" placeholder=" " name="password_confirmation" id="password2" required="">
                            </div>
                            <div class="sub-w3l">
                                <div class="sub-agile">
                                    <input type="checkbox" id="brand2" required="">
                                    <label for="brand2" class="mb-3">
                                        <span></span><a href="{{ url('/aboutus') }}">I Accept to the Terms & Conditions</a></label>
                                </div>
                            </div>
                            <div class="right-w3l">
                                {!! Form::submit(trans('message.register'), ['class' => 'form-control btn-theme text-white']) !!}
                                {!! Form::close() !!}
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

        {{-- show a message when email or username has exist in system; --}}
        <script type="text/javascript">
                $( document ).ready(function() {
                    $('#email123').blur(function()
                    {
                        var email = $(this).val();
                        $.get('unique/' + email, function(data) {
                            if (data == "1" )
                            {
                                alert('email has exist in our system, please try again with another email or you can press "Forget password"');
                            }
                        });
                    });
                });
        </script>
@endsection
