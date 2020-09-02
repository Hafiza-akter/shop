@extends('../master')
@section('title','Add banner')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add new banner</h3>
                <a class="btn-sm btn-primary float-right custombtn1" href="{{route('bannerList')}}" role="button"><i class="fas fa-list"></i> Banner List</a>
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
              
              <form class="form-horizontal" method="post" action="{{route('bannerStore')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="title" required placeholder="Title">
                    </div>
                  </div>
                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-6">
                      <input type="file" class="form-control" name="image" required>
                      <label for="inputEmail3" class="col-sm-12 col-form-label text-danger">Size must be: 1159 X 398 </label>
                    </div>
                  </div>
                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Redirect link</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="link" required placeholder="Image">
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