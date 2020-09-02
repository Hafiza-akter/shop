@extends('../master')
@section('title','Add Coupon')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add new Coupon</h3>
                <a class="btn-sm btn-primary float-right custombtn1" href="{{route('couponList')}}" role="button"><i class="fas fa-list"></i> Coupon List</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
              
              <form class="form-horizontal" method="post" action="{{route('couponStore')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Code</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="code" required placeholder="Enter coupon code">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group required row ">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Type</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="type" required>
                            <option value="percentage">Percentage</option>
                            <option value="cash">Cash</option>
                            </select>                    
                        </div>
                      </div>
                    </div> 
                  </div>
                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Value</label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" name="value" required placeholder="Enter amount or percentage">
                    </div>
                  </div>

                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Upto</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="upto" required placeholder="Enter highest amount">
                    </div>
                  </div>

                  <div class="form-group required row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Validity</label>
                  <div class="input-group col-sm-6 date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="validity" required class="form-control datetimepicker-input" data-target="#reservationdate">
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <!-- /.form group -->
                 
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group required row ">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Active Status</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="active_status" required>
                            <option value="1">Active</option>
                            <option value="0">Disable</option>
                            </select>                    
                        </div>
                      </div>
                    </div> 
                  </div>
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Submit</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
        </div>
    </div>
</div>

@endsection