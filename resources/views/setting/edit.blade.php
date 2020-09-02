@extends('../master')
@section('title','Company Setting')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit company setting</h3>
                <a class="btn-sm btn-primary float-right custombtn1" href="{{route('settinglist')}}" role="button"><i class="fas fa-list"></i> Setting</a>
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
              
              <form class="form-horizontal" method="post" action="{{route('settingupdate')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$comInfo->id}}">
                <div class="card-body">
                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Company Name</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" value="{{$comInfo->name}}" name="name" required >
                    </div>
                  </div>
                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Company Phone</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" value="{{$comInfo->phone}}" name="phone" required >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Logo</label>
                    <div class="col-sm-6">
                      <img  id="imgthumb" src="{{asset('/website/images/'.$comInfo->logo)}}" width="100px" style="{{ $comInfo->logo ? '' : 'display:none;' }}">
                        <div class="mt-2" style="{{ $comInfo->logo ? '' : 'display:none;' }}" id="oldremove">
                            <a class="btn btn-sm btn-danger" >Remove</a>
                        </div>
                        <input type="file" id="imginput" class="form-control" name="image"  placeholder="Image" style="{{ $comInfo->logo ? 'display:none;' : '' }}">
                        <span id="sizemsg"  style="{{ $comInfo->logo ? 'display:none;' : 'color:red' }}">Image size should  be 117 X 30 </span>
                    </div>
                    
                  
                  </div>
                  <div class="form-group required row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Company Address</label>
                      <div class="col-sm-6">
                      <textarea  class="form-control" required name="address"  >{{$comInfo->address}} </textarea>
                      </div>
                    </div>
                    <div class="form-group required row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">About</label>
                      <div class="col-sm-6">
                      <textarea  class="form-control" required name="about"  >{{$comInfo->about}} </textarea>
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
