@extends('users/admins/admin_layout')
@section('admin_ticket_update')
<div class="container">
  <div class="row">
    
    <div class="col-md-12 toppad pull-right">
      <p class="text-info">Today is: {{ date('d-m-Y H:i:s', time()) }}</p>
    </div>
    @include('errors')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Update for ticket {{ $edit->username }}</h3>
        </div>
        <div class="panel-body">
        <div class="row">
          @if ( Session::has('success') )
            <p class="alert alert-success">{{ Session::get('success') }}</p>
          @endif
          <div class="col-md-12 col-lg-12">
              <table class="table table-user-information">
                <form action="{{ url ('admin/ticketdetail/' . $edit->id) }}" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Name</label>
                            <div class="col-lg-8">
                              <input class="form-control" type="text" value="{{ $edit->name }}" required="" name="name">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Description</label>
                            <div class="col-lg-8">
                              <textarea class="form-control" type="text" required="" name="description">{{ $edit->description }}</textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Price:</label>
                            <div class="col-lg-8">
                              <input class="form-control" type="number" value="{{ $edit->price }}" required="" name="price" min="10000" placeholder="VNĐ" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Time Allow Order:</label>
                            <div class="col-lg-8">
                              <input class="form-control" value="{{ $edit->time_allow_order }}" type="date" name="timeallow" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Time Start:</label>
                            <div class="col-lg-8">
                              <input class="form-control" type="datetime-local" value="{{ $edit->time_start }}"  name="timestart" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Time End:</label>
                            <div class="col-lg-8">
                              <input class="form-control" value="{{ $edit->time_end }}" type="datetime-local" name="timeend" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Number of Tickets:</label>
                            <div class="col-lg-8">
                              <input class="form-control" value="{{ $edit->number_of_tickets }}" type="number" min="1" name="notickets" >
                            </div>
                          </div>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
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