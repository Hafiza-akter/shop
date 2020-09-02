@extends('../master')
@section('title','Edit Sub Category')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Sub category</h3>
                <a class="btn-sm btn-primary float-right custombtn1" href="{{route('subCategoryList')}}" role="button"><i class="fas fa-list"></i> Sub Category List</a>
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
              
              <form class="form-horizontal" method="post" action="{{route('subCategoryUpdate')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$subCategory->id}}">
                <div class="card-body">
                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" value="{{$subCategory->name}}" name="name" required placeholder="Title">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group required row ">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Main Category</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="category" required>
                            <option value="">---select main category---</option>
                            @foreach($category as $cat)
                            <option value="{{$cat->id}}" {{($cat->id == $subCategory->category_id) ? 'selected' : ''}}>{{$cat->name}}</option>
                            @endforeach
                            </select>                    
                        </div>
                  </div>
                </div> 
              </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-6">
                      <img  id="imgthumb" src="{{asset('images/'.$subCategory->img_path)}}" width="100px" style="{{ $subCategory->img_path ? '' : 'display:none;' }}">
                        <div class="mt-2" style="{{ $subCategory->img_path ? '' : 'display:none;' }}" id="oldremove">
                            <a class="btn btn-sm btn-danger" >Remove</a>
                        </div>
                        <input type="file" id="imginput" class="form-control" name="image"  placeholder="Image" style="{{ $subCategory->img_path ? 'display:none;' : '' }}">
                        <span id="sizemsg"  style="{{ $subCategory->img_path ? 'display:none;' : 'color:red' }}">Image size should  be 338 X 399 </span>

                    </div>
                  
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group required row ">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="status" required>
                            <option {{($subCategory->status == 1) ? 'selected' : ''}} value="1">Active</option>
                            <option {{($subCategory->status == 0) ? 'selected' : ''}} value="0">Disable</option>
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
