@extends('front_layout')
@section('notification')
@include('errors')
@if(session()->has('message.level'))
                <div class="alert alert-{{ session('message.level') }}">
                {!! session('message.content') !!}
                </div>
@endif

@endsection