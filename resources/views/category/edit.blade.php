@extends('../master')
@section('title','Edit Category')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit category</h3>
                <a class="btn-sm btn-primary float-right custombtn1" href="{{route('categoryList')}}" role="button"><i class="fas fa-list"></i> Category List</a>
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
              
              <form class="form-horizontal" method="post" action="{{route('categoryUpdate')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$category->id}}">
                <div class="card-body">
                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" value="{{$category->name}}" name="name" required placeholder="Title">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-6">
                      <img  id="imgthumb" src="{{asset('images/'.$category->img_path)}}" width="100px" style="{{ $category->img_path ? '' : 'display:none;' }}">
                        <div class="mt-2" style="{{ $category->img_path ? '' : 'display:none;' }}" id="oldremove">
                            <a class="btn btn-sm btn-danger" >Remove</a>
                        </div>
                        <input type="file" id="imginput" class="form-control" name="image"  placeholder="Image" style="{{ $category->img_path ? 'display:none;' : '' }}">
                        <span id="sizemsg"  style="{{ $category->img_path ? 'display:none;' : 'color:red' }}">Image size should  be 338 X 399 </span>

                    </div>
                  
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group required row ">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="status" required>
                            <option {{($category->status == 1) ? 'selected' : ''}} value="1">Active</option>
                            <option {{($category->status == 0) ? 'selected' : ''}} value="0">Disable</option>
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
