@extends('../master')
@section('title','Edit Coupon')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Coupon Details</h3>
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
              
              <form class="form-horizontal" method="post" action="{{route('couponUpdate')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$coupon->id}}">
                <div class="card-body">
                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Code</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="code" required value="{{$coupon->code}}">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group required row ">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Type</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="type" required>
                            <option value="percentage"  {{($coupon->type == 'percentage')? 'selected':''}}>Percentage</option>
                            <option value="cash"  {{($coupon->type == 'cash')? '':'selected'}}>Cash</option>
                            </select>                    
                        </div>
                      </div>
                    </div> 
                  </div>
                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Value</label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" name="value" required value="{{$coupon->value}}">
                    </div>
                  </div>

                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Upto</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="upto" required value="{{$coupon->upto}}">
                    </div>
                  </div>

                  <div class="form-group required row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Validity</label>
                  <div class="input-group col-sm-6 date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="validity" value="{{$coupon->validity}}" required class="form-control datetimepicker-input" data-target="#reservationdate">
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
                            <option value="1" {{($coupon->active_status == 1)? 'selected':''}}>Active</option>
                            <option value="0" {{($coupon->active_status == 0)? '':'selected'}}>Disable</option>
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