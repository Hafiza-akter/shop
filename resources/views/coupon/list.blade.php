@extends('../master')
@section('title','Coupon List')

@section('content')
<div class="container-fluid">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">coupon List</h3>
                <a class="btn btn-sm btn-primary float-right" href="{{route('couponCreate')}}" role="button"><i class="fas fa-plus"></i> Add</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Amount</th>
                      <th>Active_status</th>
                      <th style="width: 100px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php $i=1 @endphp
                  @foreach($couponList as $coup)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $coup->code }}</td>
                      <td>{{ $coup->type }}</td>
                      <td>{{ $coup->value }}</td>
                      <td>
                          @if($coup->active_status == '1')
                            <span class="badge badge-info">Active</span>
                          @else
                            <span class="badge badge-secondary">Inactive</span>
                          @endif
                      </td>
                      <td>
                       <a href="{{route('couponEdit',$coup->id)}}"><i class="fas fa-edit"></i></a>
                       <a href="{{route('couponDelete',$coup->id)}}" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
              
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <div class="float-right">{{ $couponList->links() }}</div> 
              </div>
            </div>
      </div><!-- /.container-fluid -->

      @endsection