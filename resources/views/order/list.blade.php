@extends('../master')
@section('title','Order List')

@section('content')
<div class="container-fluid">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Order List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>ID</th>
                      <th>Order Date</th>
                      <th>Status</th>
                    
                      <th>Total Amount</th>
                      <th>Discount</th>
                      <th>Payable amount</th>                      
                      <th style="width: 100px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php $i=1 @endphp
                  @foreach($orderList as $order)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>orderNo/{{ date('Y-m-d') }}/{{ $order->id }}</td>
                   
                      <td>{{ $order->order_date }}</td>
                      <td>
                          @if($order->order_status == '1')
                            <span class="badge badge-info">Processing</span>
                          @else
                            <span class="badge badge-secondary">Shipped</span>
                          @endif
                      </td>
                      
                      <td>
                      @php $total = 0 @endphp
                        @foreach($order->getTotalPrice as $singlePrice)
                            @php $total = $total + (($singlePrice->price)*($singlePrice->qty)) @endphp
                        @endforeach
                        {{$total}}
                      </td>

                      <?php 
                      $value = 'N/A';
                        if($order->coupon_id){
                            $type = $order->getDiscount->type;
                            if($type == 'cash'){
                              $value = $order->getDiscount->value;
                            }
                            else{
                              $value = $order->getDiscount->value;
                              $discountValue = ($total * $value)/100;
                              if($discountValue > $order->getDiscount->upto){
                                $value = 500;
                              }
                              else{
                                $value = $discountValue;
                              }
                            }
                        }
                      ?>
                      <td>{{ $value}}</td>
                      <td>
                        <?php
                          if($order->coupon_id){
                            if(($total-$value)<0){
                              $payable = 0;
                            }
                            else{
                              $payable = $total-$value;
                            }
                          }
                          else{
                            $payable = $total;
                          }
                        ?>
                      {{ $payable}}
                    
                    </td>
                     
                      <td>
                       <a href="{{route('orderItemShow',$order->id)}}"><i class="fas fa-eye"></i></a>
                      </td>
                      
                    </tr>
                   @endforeach
                   
                  </tbody>
                </table>
              
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <div class="float-right">{{ $orderList->links() }}</div> 
              </div>
            </div>
      </div><!-- /.container-fluid -->

      @endsection