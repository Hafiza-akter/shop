@extends('../master')
@section('title','Add banner')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit banner</h3>
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
              
              <form class="form-horizontal" method="post" action="{{route('bannerUpdate')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$banner->id}}">
                <div class="card-body">
                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="title" required value="{{$banner->title}}">
                    </div>
                  </div>
                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-6">
                      <!-- <input type="file" class="form-control" name="image" required>-->
                      <label for="inputEmail3" class="col-sm-12 col-form-label text-danger bannimg" style="{{($banner->img_path)? 'display:none':''}}">Size must be: 1159 X 398 </label> 
                      <img src="{{asset('images/banner/'.$banner->img_path)}}" class="remove-img" style="width:100%; height:auto"/>
                      <?php if($banner->img_path){ ?>
                          <a class="btn btn-danger" id="remove-btn" style="{{($banner->img_path)? '':'display:none'}}">Remove</a>
                          <input type="file" name="image"  id="inputimg" style="{{($banner->img_path)? 'display:none':''}}" class="form-control">

                        <?php } ?>
                    </div>
                  </div>
                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Redirect link</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="link" required value="{{$banner->link}}">
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