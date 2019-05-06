@extends('users/admins/admin_layout')
@section('admin_add_ticket')
<div class="container">
  <div class="row">
    <div class="col-md-12 toppad pull-right">
      <p class="text-info">Today is: {{ date('d-m-Y H:i:s', time()) }}</p>
    </div>
    @include('errors')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Add ticket</h3>
        </div>
        <div class="panel-body">
        <div class="row">
          @if ( Session::has('success') )
            <p class="alert alert-success">{{ Session::get('success') }}</p>
          @endif
          <div class="col-md-12 col-lg-12">
              <table class="table table-user-information">
                <form action="{{ url ('admin/addticket') }}" method="post">
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Name</label>
                            <div class="col-lg-8">
                              <input class="form-control" type="text" value="" required="" name="name" placeholder="input name">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Description</label>
                            <div class="col-lg-8">
                              <textarea class="form-control" type="text" required="" name="description" placeholder="input descript for ticket"></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Price:</label>
                            <div class="col-lg-8">
                              <input class="form-control" type="number" value="" required="" name="price" min="10000" placeholder="VNĐ" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Time Allow Order:</label>
                            <div class="col-lg-8">
                              <input class="form-control" value="" type="date" name="timeallow" required placeholder="input time allow order">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Time Start:</label>
                            <div class="col-lg-8">
                              <input class="form-control" value="" type="datetime-local" name="timestart" required placeholder="input time start of bus">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Time End:</label>
                            <div class="col-lg-8">
                              <input class="form-control" value="" type="datetime-local" name="timeend" required placeholder="input time end of bus">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Number of Tickets:</label>
                            <div class="col-lg-8">
                              <input class="form-control" value="" type="number" min="1" name="notickets" placeholder="input number of seats available">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Starting_Point</label>
                            <div class="col-lg-8">
                              <select name="start" class="form-control" id="start" required>
                              <option value="">-- Select Starting Point --</option>
                              @foreach ($location as $name)
                                  <option value="{{ $name->id }}">{{ ucfirst($name->name) }}</option>
                              @endforeach
                              </select>
                            </div>
                            <label class="col-lg-3 control-label">Destination</label>
                            <div class="col-lg-8">
                              <select name="start" class="form-control" id="start" required>
                              <option value="">-- Select Destination --</option>
                              @foreach ($location as $name)
                                  <option value="{{ $name->id }}">{{ ucfirst($name->name) }}</option>
                              @endforeach
                              </select>
                            </div>
                            </div>
                          </div>
                    </div>
                    <button type="submit" class="btn btn-success" style="width:69.59px;">Add</button>
                    <input type="reset" class="btn btn-default" value="Cancel">
               </form>
              </table>
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
          <span class="pull-right">
            <a href="{{ url('admin/ticket') }}" data-toggle="tooltip" type="button" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection