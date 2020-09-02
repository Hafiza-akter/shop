@extends('../master')
@section('title','Banner List')

@section('content')
<div class="container-fluid">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category List</h3>
                <a class="btn btn-sm btn-primary float-right" href="{{route('bannerCreate')}}" role="button"><i class="fas fa-plus"></i> Add</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Title</th>
                      <th class="bannerhead">Image</th>
                      <th>Redirect Link</th>
                      <th>Status</th>
                      <th style="width: 50px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php $i=1 @endphp
                  @foreach($banners as $banner)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $banner->title }}</td>
                      <td>
                        <img class="bannerimg" src="{{asset('images/banner/')}}/{{$banner->img_path}}"/>
                      </td>
                      <td><a href="{{$banner->link}}">Goes to</a></td>
                      <td>
                          @if($banner->status == '1')
                            <span class="badge badge-info">Active</span>
                          @else
                            <span class="badge badge-secondary">Inactive</span>
                          @endif
                      </td>
                      <td>
                       <a href="{{route('bannerEdit',$banner->id)}}"><i class="fas fa-edit"></i></a>
                       <a href="{{route('bannerDelete',$banner->id)}}" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
              
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <div class="float-right">{{ $banners->links() }}</div> 
              </div>
            </div>
      </div><!-- /.container-fluid -->

      @endsection