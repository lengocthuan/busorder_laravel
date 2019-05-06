@extends('users/admins/admin_layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 toppad pull-right">
      <p class="text-info">Today is: {{ date('d-m-Y H:i:s', time()) }}</p>
    </div>
    @include('errors')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title"> Add bus informations </h3>
        </div>
        <div class="panel-body">
        <div class="row">
          @if ( Session::has('success') )
            <p class="alert alert-success">{{ Session::get('success') }}</p>
          @endif
          <div class="col-md-12 col-lg-12">
              <table class="table table-user-information">
                <form action="{{ url ('admin/addbusinfo') }}" method="post" >
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Bus Router ID</label>
                            <div class="col-lg-8">
                              <select name="brouter" class="form-control" id="brouter" required>
                                <option value="">-- Select Bus Router ID --</option>
                                @foreach ($bus as $id)
                                    <option value="{{ $id->id }}">{{ $id->name }}</option>
                                @endforeach
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Driver ID</label>
                            <div class="col-lg-8">
                              <input class="form-control" type="text" value="" readonly="" name="drive">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Ticket Control</label>
                            <div class="col-lg-8">
                              <input class="form-control" type="text" value="" readonly="" name="tcontrol">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Accompanied Service</label>
                            <div class="col-lg-8">
                              <input class="form-control" type="text" value="" readonly="" name="aservice">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Status</label>
                            <div class="col-lg-8">
                              <select name="status" class="form-control" id="status" required>
                                <option></option>
                                <option>Ready</option>
                                <option>Not Ready</option>
                                <option>No connection</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Number Seats</label>
                            <div class="col-lg-8">
                              <input class="form-control" value="" type="number" name="nseats" max="{{ $max }}"  required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">User ID</label>
                            <div class="col-lg-8">
                              <select name="user_id" class="form-control" id="uid" required>
                                <option value="">-- Select User ID --</option>
                                @foreach ($user as $id)
                                    <option value="{{ $id->id }}">{{ $id->id }}</option>
                                @endforeach
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Ticket ID</label>
                            <div class="col-lg-8">
                              <select name="ticket_id" class="form-control" id="tickid" required>
                                <option value="">-- Select Ticket ID --</option>
                                @foreach ($ticket as $id)
                                    <option value="{{ $id->id }}">{{ $id->id }}</option>
                                @endforeach
                                </select>
                            </div>
                          </div>
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
            <a href="{{ url('admin/businfo') }}" data-toggle="tooltip" type="button" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection