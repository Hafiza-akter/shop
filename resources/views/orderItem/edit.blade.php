@extends('../master')
@section('title','Edit Product')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit product</h3>
                <a class="btn-sm btn-primary float-right custombtn1" href="{{route('productList')}}" role="button"><i class="fas fa-list"></i> Product List</a>
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
              <div class="card-body">
             
                <form class="form" method="post" action="{{route('productUpdate')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value={{$product->id}}>

                <div class="row">
                  <div class="col-sm-8">
                      <div class="row">
                          <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group required">
                              <label>Name</label>
                              <input type="text" class="form-control" name="name" required value={{$product->name}}>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group required">
                              <label>SKU</label>
                              <input type="text" class="form-control" name="sku" required value={{$product->sku}}>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                              <label>Brand</label>
                              <input type="text" class="form-control" name="brand" value={{$product->brand}}>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group required">
                              <label>Selling Price</label>
                              <input type="number" class="form-control" name="sell_price" required value={{$product->sell_price}}>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group required">
                              <label>Buying Price</label>
                              <input type="number" class="form-control" name="buy_price" required value={{$product->buy_price}}>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group required">
                              <label>Quantity</label>
                              <input type="number" required class="form-control" name="quantity"  value={{$product->quantity}}>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                              <label>Status</label>
                              <select class="form-control" name="status" required>
                                <option value="1" {{($product->status == 1) ? 'selected':''}}>Active</option>
                                <option value="0" {{($product->status == 0) ? '':'selected'}}>Disable</option>
                              </select>  
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group required">
                              <label>Category</label>
                                  <select class="form-control" name="category">
                                      <option value="">---select---</option>
                                      @foreach($categoryList as $category)
                                      <option value="{{$category->id}}" {{($product->categoty_id == $category->id) ? 'selected' : '' }}>{{$category->name}}</option>
                                      @endforeach
                                </select> 
                            </div>
                          </div>
                     
                          <div class="col-sm-6">
                            <div class="form-group required">
                              <label>Supplier</label>
                                <select class="form-control" name="supplier_id">
                                  <option value="">---select---</option>
                                  @foreach($supplierList as $supplier)
                                  <option value="{{$supplier->id}}" {{($product->supplier == $supplier->id) ? 'selected' : ''}}>{{$supplier->name}}</option>
                                  @endforeach
                              </select>   
                           </div>
                          </div>
                         
                          <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group ">
                              <label>Warrenty</label>
                              <input type="text"  class="form-control" name="warranty"  value={{$product->warranty}}>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group required">
                              <label>Description</label>
                              <textarea  class="form-control" required name="desc"  >{{$product->desc}} </textarea>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group ">
                              <label>Return Policy</label>
                              <textarea  class="form-control" name="return_policy" > {{$product->return_policy}}</textarea>
                            </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-4">
                  <label>Image</label>
                          <div class="form-group required">
                              @foreach($product->getProductImages as $image)
                              @php $imgcount = $product->getProductImages->count() @endphp
                                <img src="{{asset('images/products/'.$image->img_path)}}" class="remove-img" style="width:200px; height:auto"/>
                              @endforeach
                              </br></br><a class="btn btn-danger" id="remove-btn" style="{{($imgcount > 0)? '':'display:none'}}">Remove</a>
                              <input type="file" name="image"  id="inputimg" style="{{($imgcount > 0)? 'display:none':''}}" class="form-control">
                            
                          </div>

                  </div>
              </div>
              <div class="card-footer">
                  <button type="submit" class="btn btn-info">Submit</button>
              </div>
            </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection