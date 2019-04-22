@extends('users/admins/admin_layout')
@section('admin_update_buslist')
<div class="container">
  <div class="row">
    
    <div class="col-md-12 toppad pull-right">
      <p class="text-info">Today is: {{ date('d-m-Y H:i:s', time()) }}</p>
    </div>
    @include('errors')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Bus Location</h3>
        </div>
        <div class="panel-body">
        <div class="row">
          @if ( Session::has('msg') )
            <p class="alert alert-info">{{ Session::get('msg') }}</p>
          @endif
          
          <div class="col-md-12 col-lg-12">
              <table class="table table-user-information">
                <form action="{{ url ('admin/updateroutebus/' . $edit->id) }}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="input name" value="{{$edit->name}}" required="" />
                        <label>Description</label>
                        <textarea class="form-control" name="descript" placeholder="input description" value="" required="">{{$edit->description}}</textarea>
                        <label>Starting_Point</label>
                        <input type = "number" min="1" max="{{ $location->id }}" class="form-control" name="starting" placeholder="input starting point" value="{{$edit->starting_point}}" required=""/>
                        <label>Destination</label>
                        <input type = "number" min="1" max="{{ $location->id }}" class="form-control" name="destination" placeholder="input destination" value="{{$edit->destination}}" required=""/>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
              </table>
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
          <span class="pull-right">
            <a href="{{ url('admin/routerlist') }}" data-toggle="tooltip" type="button" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection