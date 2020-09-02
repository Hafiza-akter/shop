@extends('../master')
@section('title','User List')

@section('content')
<div class="container-fluid">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sub category List</h3>
                <a class="btn btn-sm btn-primary float-right" href="{{route('subCategoryCreate')}}" role="button"><i class="fas fa-plus"></i> Add</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Parent</th>
                      <th>Image</th>
                      <th>Status</th>
                      <th style="width: 100px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php $i=1 @endphp
                  @foreach($scategory as $cat)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $cat->name }}</td>
                      <td>{{ $cat->getCategoryInfo->name}}</td>
                      <td>
                        <img src="{{asset('images')}}/{{$cat->img_path}}" style="width:50px; height:50px" />
                      </td>
                      <td>
                          @if($cat->status == '1')
                            <span class="badge badge-info">Active</span>
                          @else
                            <span class="badge badge-secondary">Inactive</span>
                          @endif
                      </td>
                      <td>
                       <a href="{{route('subCategoryEdit',$cat->id)}}"><i class="fas fa-edit"></i></a>
                       <a href="{{route('subCategoryDelete',$cat->id)}}" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
              
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <div class="float-right">{{ $scategory->links() }}</div> 
              </div>
            </div>
      </div><!-- /.container-fluid -->

      @endsection