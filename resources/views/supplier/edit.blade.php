@extends('../master')
@section('title','Edit Supplier')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Supplier</h3>
                <a class="btn-sm btn-primary float-right custombtn1" href="{{route('supplierList')}}" role="button"><i class="fas fa-list"></i> Supplier List</a>
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
              
              <form class="form-horizontal" method="post" action="{{route('supplierUpdate')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$supplier->id}}">
                <div class="card-body">
                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="name" required value="{{$supplier->name}}">
                    </div>
                  </div>
                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-6">
                      <textarea name="address"  class="form-control" required>{{$supplier->address}}</textarea>
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