@extends('../master')
@section('title','Product List')

@section('content')
<div class="container-fluid">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Product List</h3>
                <a class="btn btn-sm btn-primary float-right" href="{{route('productCreate')}}" role="button"><i class="fas fa-plus"></i> Add</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th>Category</th>
                      <th>Selling Price</th>
                      <th>SKU</th>
                      <th>Status</th>
                      <th style="width: 100px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php $i=1 @endphp

                  @foreach($productList as $product)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $product->name }}</td>
                      <td>
                        <!-- <img src="{{asset('images')}}/{{$product->img_path}}" style="width:50px; height:50px" /> -->
                        @foreach($product->getProductImages as $image)
                        <img src="{{asset('images/products/'.$image->img_path)}}" style="width:50px; height:50px" />
                        @endforeach
                      </td>
                      <td>{{ $product->getCategoryInfo->name }}
                      
                      </td>
                      <td>{{ $product->sell_price }} ৳ </td>
                      <td>{{ $product->sku }}</td>
                      <td>
                          @if($product->status == '1')
                            <span class="badge badge-info">Active</span>
                          @else
                            <span class="badge badge-secondary">Inactive</span>
                          @endif
                      </td>
                      <td>
                       <a href="{{route('productEdit',$product->id)}}"><i class="fas fa-eye"></i></a>
                       <a href="{{route('productEdit',$product->id)}}"><i class="fas fa-edit"></i></a>
                       <a href="{{route('productDelete',$product->id)}}" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <div class="float-right">{{ $productList->links() }}</div> 
              </div>
            </div>
      </div><!-- /.container-fluid -->

      @endsection