@extends('../master')
@section('title','User List')

@section('content')
<div class="container-fluid">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">User List</h3>
                <a class="btn btn-sm btn-primary float-right" href="{{route('useradd')}}" role="button"><i class="fas fa-plus"></i> Add</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Is_Super_Admin?</th>
                      <th style="width: 100px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php $i=1 @endphp
                  @foreach($userList as $user)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>
                          @if($user->status == '1')
                            <span class="badge badge-info">Active</span>
                          @else
                            <span class="badge badge-secondary">Inactive</span>
                          @endif
                      </td>
                      <td>
                          @if($user->is_super_admin == 1)
                          <i class="fas fa-check blue"></i>
                          @else
                          <i class="fas fa-times red"></i>
                          @endif
                      </td>
                      <td>
                       <a href="{{route('useredit',$user->id)}}"><i class="fas fa-edit"></i></a>
                       <a href="{{route('userdelete',$user->id)}}" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
              
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <div class="float-right">{{ $userList->links() }}</div> 
              </div>
            </div>
      </div><!-- /.container-fluid -->

      @endsection