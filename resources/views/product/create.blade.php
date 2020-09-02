@extends('../master')
@section('title','Add Product')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add new product</h3>
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
              
              <form class="form-horizontal" method="post" name="form" action="{{route('productStore')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="name" required placeholder="Title" value="{{ old('name') }}">
                    </div>
                  </div>
                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">SKU</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="sku" required placeholder="SKU" value="{{ old('sku') }}">
                    </div>
                  </div>
                  <div class="form-group  row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Brand</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="brand" placeholder="Brand name" value="{{ old('brand') }}">
                    </div>
                  </div>
                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Selling Price</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="sell_price" required placeholder="Selling price" value="{{ old('sell_price') }}">
                    </div>
                  </div>
                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Buying Price</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="buy_price" required placeholder="Buying Price" value="{{ old('buy_price') }}">
                    </div>
                  </div>
                  
                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Quantity</label>
                    <div class="col-sm-8">
                      <input type="number" required class="form-control" name="quantity" required placeholder="Stock Quantity" value="{{ old('quantity') }}">
                    </div>
                  </div>
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Is featured?</label>
                      <div class="col-sm-9 pl-5">
                        <input class="form-check-input" type="checkbox" name="featured">
                        <label class="col-sm-8">Is it feature product?</label>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Is sale?</label>
                      <div class="col-sm-9 pl-5">
                        <input class="form-check-input" type="checkbox" id="is_sale" name="is_sale">
                        <label class="col-sm-4">Is it on sale?</label>
                      </div>
                  </div>

                  <div class="form-group row" id="discount_percentage">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Discount Percentage</label>
                    <div class="col-sm-8">
                      <input type="number"  class="form-control discount_percentage" name="discount_percentage"  placeholder="Discount percentage" >
                    </div>
                  </div>
                  
                <div class="form-group required row ">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Status</label>
                  <div class="col-sm-8">
                      <select class="form-control" name="status" required>
                      <option value="1">Active</option>
                      <option value="0">Disable</option>
                      </select>                    
                  </div>
                </div>
                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Category</label>
                    <div class="col-sm-8">
                            <select class="form-control" name="category" required >
                            <option value="">---select---</option>
                            @foreach($categoryList as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                            </select>                    
                        </div>
                  </div>

                  <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Image</label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control" name="image" required placeholder="Image">
                    </div>
                  </div>

                  
                      <div class="form-group row ">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Supplier</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="supplier_id">
                            <option value="">---select---</option>
                            @foreach($supplierList as $supplier)
                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                            @endforeach
                            </select>                    
                        </div>
                  </div>
                
                <div class="form-group required row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-8">
                      <textarea  class="form-control" required name="desc"  placeholder="Product Details">{{ old('desc') }} </textarea>
                    </div>
                </div>
                <div class="form-group  row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label"> Policy</label>
                    <div class="col-sm-8">
                      <textarea  class="form-control" name="return_policy"  placeholder="Return Policy Details"> {{ old('return_policy') }}</textarea>
                    </div>
                </div>
                <div class="form-group  row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Warrenty</label>
                    <div class="col-sm-8">
                      <input type="text"  class="form-control" name="warranty" value="{{ old('warranty') }}"  placeholder="Product Warranty">
                    </div>
                  </div>
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Submit</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
        </div>
    </div>
</div>
@endsection