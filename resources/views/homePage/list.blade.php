@extends('../master')
@section('title','Home Information')

@section('content')
<div class="container-fluid">
      <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>Category One</th>
                      <th>Category One</th>
                      <th>Category One</th>
                      <th>Banner one</th>
                      <th>Banner two</th>
                      <th>Banner three</th>
                      <th style="width: 100px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>{{$homeSetting->getCategory->name}}</td>
                        <td>{{$homeSetting->getCategory2->name}}</td>
                        <td>{{$homeSetting->getCategory3->name}}</td>
                        <td><img style="width:200px" src="{{asset('/website/images/banner/'.$homeSetting->banner1)}}" /></td>
                        <td><img style="width:200px" src="{{asset('/website/images/banner/'.$homeSetting->banner2)}}" /></td>
                        <td><img style="width:200px" src="{{asset('/website/images/banner/'.$homeSetting->banner3)}}" /></td>
                        <td><a href="{{route('homepageedit',$homeSetting->id)}}"><i class="fas fa-edit"></i></a></td>
                    </tr>
                  
                  </tbody>
                </table>
              
              </div>
              <!-- /.card-body -->
             
            </div>
      </div><!-- /.container-fluid -->

      @endsection