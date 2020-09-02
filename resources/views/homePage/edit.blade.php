@extends('../master')
@section('title','Home page setting')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Home page setting</h3>
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
              
              <form class="form-horizontal" method="post" action="{{route('homepageupdate')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$homeSetting->id}}">
                <div class="card-body">
                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Category One</label>
                    <div class="col-sm-6">
                            <select class="form-control" name="category1" required>
                            <option value="">---select category---</option>
                            @foreach($category as $cat)
                            <option value="{{$cat->id}}" {{($cat->id == $homeSetting->category1) ? 'selected' : ''}}>{{$cat->name}}</option>
                            @endforeach
                            </select>  
                     </div>
                  </div>
                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Category Two</label>
                    <div class="col-sm-6">
                            <select class="form-control" name="category2" required>
                            <option value="">---select category---</option>
                            @foreach($category as $cat)
                            <option value="{{$cat->id}}" {{($cat->id == $homeSetting->category2) ? 'selected' : ''}}>{{$cat->name}}</option>
                            @endforeach
                            </select>                      
                      </div>
                  </div>
                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Category Three</label>
                    <div class="col-sm-6">
                    <select class="form-control" name="category3" required>
                            <option value="">---select category---</option>
                            @foreach($category as $cat)
                            <option value="{{$cat->id}}" {{($cat->id == $homeSetting->category3) ? 'selected' : ''}}>{{$cat->name}}</option>
                            @endforeach
                            </select>  
                    </div>
                  </div>
                 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Banner One</label>
                    <div class="col-sm-6">
                      <img  id="imgthumb" src="{{asset('/website/images/banner/'.$homeSetting->banner1)}}" width="100px" style="{{ $homeSetting->banner1 ? '' : 'display:none;' }}">
                        <div class="mt-2" style="{{ $homeSetting->banner1 ? '' : 'display:none;' }}" id="oldremove">
                            <a class="btn btn-sm btn-danger" >Remove</a>
                        </div>
                        <input type="file" id="imginput" class="form-control" name="banner1"  placeholder="Image" style="{{ $homeSetting->banner1 ? 'display:none;' : '' }}">
                        <span id="sizemsg"  style="{{ $homeSetting->banner1 ? 'display:none;' : 'color:red' }}">Image size should  be 800 X 152 </span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Banner Two</label>
                    <div class="col-sm-6">
                      <img  id="imgthumb2" src="{{asset('/website/images/banner/'.$homeSetting->banner2)}}" width="100px" style="{{ $homeSetting->banner2 ? '' : 'display:none;' }}">
                        <div class="mt-2" style="{{ $homeSetting->banner2 ? '' : 'display:none;' }}" id="oldremove2">
                            <a class="btn btn-sm btn-danger" >Remove</a>
                        </div>
                        <input type="file" id="imginput2" class="form-control" name="banner2"  placeholder="Image" style="{{ $homeSetting->banner2 ? 'display:none;' : '' }}">
                        <span id="sizemsg2"  style="{{ $homeSetting->banner2 ? 'display:none;' : 'color:red' }}">Image size should  be 800 X 152 </span>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Banner Two</label>
                    <div class="col-sm-6">
                      <img  id="imgthumb3" src="{{asset('/website/images/banner/'.$homeSetting->banner2)}}" width="100px" style="{{ $homeSetting->banner2 ? '' : 'display:none;' }}">
                        <div class="mt-2" style="{{ $homeSetting->banner2 ? '' : 'display:none;' }}" id="oldremove3">
                            <a class="btn btn-sm btn-danger" >Remove</a>
                        </div>
                        <input type="file" id="imginput3" class="form-control" name="banner3"  placeholder="Image" style="{{ $homeSetting->banner2 ? 'display:none;' : '' }}">
                        <span id="sizemsg3"  style="{{ $homeSetting->banner2 ? 'display:none;' : 'color:red' }}">Image size should  be 800 X 152 </span>
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
