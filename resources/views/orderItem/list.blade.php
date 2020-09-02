@extends('../master')
@section('title','Order Item List')

@section('content')
<div class="container-fluid">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Order Item List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Sell Price</th>
                      <th>Category</th>
                      <th>SKU</th>
                      <th>Images</th>
                      <!-- <th>SKU</th>
                      <th style="width: 100px">Action</th> -->
                    </tr>
                  </thead>
                  <tbody>
                  @php $i=1 @endphp
                  @php $total = 0 @endphp

                  @foreach($itemList as $list)
                
                     <tr>
                        <td>{{$i}}</td>
                        <td>{{$list->getProducts->name}}</td>
                        <td>{{($list->getProducts->sell_price)}}X{{($list->qty)}} = {{($list->getProducts->sell_price)*($list->qty)}}</td>
                        <td>{{$list->getProducts->getCategoryInfo->name}}</td>
                        <td>{{$list->getProducts->sku}}</td>
                        <td>
                           @foreach($list->getProducts->getProductImages as $image)
                            <img src="{{asset('/images/products/'.$image->img_path)}}" style="width:50px">
                           @endforeach
                        </td>
                     </tr>  
                     @php $total = $total + (($list->getProducts->sell_price)*($list->qty)) @endphp                   
                     @php $i++ @endphp                   
                   @endforeach

                   <tr>
                        <td></td>
                        <td></td>
                        <td> {{$total}} BDT Total</td>
                        <td></td>
                        <td></td>
                        <td></td>
                       
                     </tr> 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              
            </div>
      </div><!-- /.container-fluid -->

      @endsection