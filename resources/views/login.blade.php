	@extends('front_layout')
	@section('login')
	<div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                	@include('errors')
                    @if(session('error'))
                        <p class="alert alert-info">{{ session::get('error') }}</p>
                    @endif
                    <form action="/login" method="post" >
                    	<input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                                <label for="recipient-email" class="col-form-label">Email</label>
                                <input type="email" class="form-control border" placeholder=" " name="email" id="email123" required="" >
                            </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Password</label>
                            <input type="password" class="form-control border" placeholder=" " name="password" id="password" required="">
                        </div>
                        <div class="right-w3l">
                                {!! Form::submit(trans('message.login'), ['class' => 'form-control btn-theme text-white']) !!}
                                {!! Form::close() !!}
                        </div>
                        <div class="row sub-w3l my-3">
                            <div class="col sub-agile">
                                <input type="checkbox" id="brand1" value="">
                                <label for="brand1" class="text-muted">
                                    <span></span>Remember me?</label>
                            </div>
                            <div class="col forgot-w3l text-right text-dark">
                                <a href="#" class="textfp">Forgot Password?</a>
                            </div>
                        </div>
                        <p class="text-center">Don't have an account?
                            <a href="{{ url('/registration') }}" class="text-secondary font-weight-bold">
                                Register Now</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
@endsection