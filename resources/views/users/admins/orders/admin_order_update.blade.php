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
          <h3 class="panel-title">Update Order for {{ $order->name }}</h3>
        </div>
        <div class="panel-body">
        <div class="row">
          @if ( Session::has('success') )
            <p class="alert alert-success">{{ Session::get('success') }}</p>
          @endif
          <div class="col-md-12 col-lg-12">
              <table class="table table-user-information">
                <form action="{{ url ('admin/orderdetail/' .$order->id) }}" method="post">
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                          <div class="form-group">
                            <label class="col-lg-3 control-label">User ID</label>
                              <div class="col-lg-8">
                                <select name="user_id" class="form-control" id="start" required>
                                <option value="{{ $order->user_id }}">{{ $order->user_id }}</option>
                                @foreach ($user as $id)
                                    <option value="{{ $id->id }}">{{ $id->username }}</option>
                                @endforeach
                                </select>
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Name</label>
                            <div class="col-lg-8">
                              <input class="form-control" type="text" value="{{ $order->name }}" required="" name="name" placeholder="input name">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Total</label>
                            <div class="col-lg-8">
                              <input class="form-control" type="number" value="{{ $order->total }}" required="" name="total" min="10000" placeholder="VNĐ" />
                            </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Number of Tickets Booked:</label>
                            <div class="col-lg-8">
                              <input class="form-control" type="number" value="{{ $order->number_tickets }}" required="" name="booked" min="1" placeholder="input number of tickets booked" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Status</label>
                            <div class="col-lg-8">
                              <input class="form-control" value="{{ $order->status }}" type="text" name="status" required="" placeholder="input status for this invoice">
                            </div>
                          </div>
                    </div>
          </div>
                    <button type="submit" class="btn btn-success" style="width:69.59px;">Apply</button>
                    <input type="reset" class="btn btn-default" value="Cancel">
               </form>
              </table>
          </div>
        </div>
        </div>
        <div class="panel-footer">
          <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
          <span class="pull-right">
            <a href="{{ url('admin/order') }}" data-toggle="tooltip" type="button" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection