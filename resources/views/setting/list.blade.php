@extends('../master')
@section('title','Company Information')

@section('content')
<div class="container-fluid">
      <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th class="bannerhead">Logo</th>
                      <th>Address</th>
                      <th>About</th>
                      <th style="width: 100px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>{{$comInfo->name}}</td>
                      <td>{{$comInfo->phone}}</td>
                      <td>
                        <img  class="bannerimg" src="{{asset('/website/images/'.$comInfo->logo)}}" />
                      </td>
                      <td>{{($comInfo->address)? $comInfo->address:'N/A'}}</td>
                      <td>{{($comInfo->about)? $comInfo->about:'N/A'}}</td>
                      <td><a href="{{route('settingedit',$comInfo->id)}}"><i class="fas fa-edit"></i></a></td>
                    </tr>
                  
                  </tbody>
                </table>
              
              </div>
              <!-- /.card-body -->
             
            </div>
      </div><!-- /.container-fluid -->

      @endsection