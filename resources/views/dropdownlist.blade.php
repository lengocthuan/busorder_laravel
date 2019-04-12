@extends('front_layout')
@section('ddlist')
<div class="col-md-8 col-md-offset-2">
  <div class="panel panel-success">
      <div class="panel-heading">
       Dynamic Deop down in Laravel City in State
      </div>
      <div class="panel-body">
    <form action="/routebus" method="get">
     {{ csrf_field() }}
     <div class="row">
      <div class="col-md-6">
        @include('errors')
       <div class="form-group">
        <label for="roll">Start <span class="required">*</span></label>
        <select name="start" class="form-control" id="start">
         <option value="">-- Select Starting Point --</option>
         @foreach ($names as $name)
          <option value="{{ $name->id }}">{{ ucfirst($name->name) }}</option>
         @endforeach
        </select>
     </div>
      </div>
      {{-- <div class="col-md-6">
       <div class="form-group {{ ($errors->has('name'))?'has-error':'' }}">
        <label for="roll">City </label>
        <select name="city" class="form-control" id="city">
        </select> --}}
     </div>
      </div>
     </div>
    </form>
      </div>
    </div>
</div>
@endsection
