@extends('website.master')
@section('content')
      <div class="owl-carousel owl-carousel-slider">
         @foreach($banners as $banner)
            <div class="item">
               <a href="#"><img class="d-block img-fluid" src="{{asset('images/banner/'.$banner->img_path)}}" alt="First slide"></a>
            </div>
         @endforeach
      </div>
      <!-- Featured Products -->
      <section class="featured-products">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="carousel-section-header">
                     <h5 class="heading-design-h5">Featured Items <a href="https://askbootstrap.com/preview/osahan-fashion/user-login.html" class="btn btn-warning pull-right">Show More Items <b>24727</b> <i class="fa fa-arrow-right"></i></a></h5>
                  </div>
                  <div id="owl-carousel-featured" class="owl-carousel owl-carousel-featured">
                  @foreach($featureProducts as $fproduct)
                     <div class="item">
                        <div class="h-100">
                           <div class="product-item">
                              <span class="badge badge-danger offer-badge">HOT</span>	
                              <div class="product-item-image">
                                 <span class="like-icon"><a href="#"> <i class="icofont icofont-heart"></i></a></span>
                                 @foreach($fproduct->getProductImages as $image)
                                      @php $firstimage = $image->img_path @endphp
                                      @php break @endphp
                                 @endforeach
                                 <a href="{{route('productdetails')}}"><img class="card-img-top img-fluid" src="{{asset('images/products/'.$firstimage)}}" alt=""></a>
                              </div>
                              <div class="product-item-body">
                                 <div class="product-item-action">
                                    <a data-toggle="tooltip" data-placement="top" title="Add To Cart" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-shopping-cart"></i></a>
                                    <a data-toggle="tooltip" data-placement="top" title="View Detail" class="btn btn-theme-round btn-sm" href="{{route('productdetails')}}"><i class="icofont icofont-search-alt-2"></i></a>
                                 </div>
                                 <h4 class="card-title"><a href="#">{{ mb_substr($fproduct->name, 0, 19)}}</a></h4>
                                 <h5>
                                 <?php if($fproduct->is_sale == 1){ ?>
                                    <span class="product-desc-price">{{$fproduct->sell_price}}</span>
                                 <?php } ?>
                                    <span class="product-price"><span class="text-bold">&#2547;</span>
                                    <?php if($fproduct->is_sale == 1){ 
                                       $discount = ($fproduct->sell_price * $fproduct->discount_percentage)/100;
                                       ?>
                                       {{$fproduct->sell_price-$discount}}
                                       <?php }else{?>
                                          {{$fproduct->sell_price}}
                                       <?php } ?>
                                    </span>
                                    <?php if($fproduct->is_sale == 1){ ?>
                                       <span class="product-discount">{{$fproduct->discount_percentage}}% Off</span>
                                 <?php } ?>
                                 </h5>
                              </div>
                              <div class="product-item-footer">
                                 <div class="product-item-size">
                                    <strong>Size</strong> <span>ONE SIZE</span>
                                 </div>
                                 <div class="stars-rating">
                                    <i class="icofont icofont-star active"></i>
                                    <i class="icofont icofont-star active"></i>
                                    <i class="icofont icofont-star active"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i> <span>(415)</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  @endforeach
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Featured Products -->
      <section class="categories-list">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <h5 class="heading-design-h5">
                     Flash Sale
                  </h5>
               </div>
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="single-categorie">
                     <div id="owl-carousel-featured" class="owl-carousel categories-list-page">
                     @foreach($discountProducts as $dproduct)
                        <div class="item">
                           <div class="h-100">
                              <div class="product-item">
                                 <span class="badge badge-danger offer-badge">HOT</span>	
                                 <div class="product-item-image">
                                    <span class="like-icon"><a href="#"> <i class="icofont icofont-heart"></i></a></span>
                                    @foreach($dproduct->getProductImages as $image)
                                      @php $firstimage = $image->img_path @endphp
                                      @php break @endphp
                                    @endforeach
                                    <a href="#"><img class="card-img-top img-fluid" src="{{asset('images/products/'.$firstimage)}}" alt=""></a>
                                 </div>
                                 <div class="product-item-body">
                                    <div class="product-item-action">
                                       <a data-toggle="tooltip" data-placement="top" title="Add To Cart" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-shopping-cart"></i></a>
                                       <a data-toggle="tooltip" data-placement="top" title="View Detail" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-search-alt-2"></i></a>
                                    </div>
                                    <h4 class="card-title"><a href="#">{{ mb_substr($fproduct->name, 0, 19)}}</a></h4>
                                    <h5>
                                       <span class="product-desc-price">$529.99</span>
                                       <span class="product-price">$329.99</span>
                                       <span class="product-discount">30% Off</span>
                                    </h5>
                                 </div>
                                 <div class="product-item-footer">
                                    <div class="product-item-size">
                                       <strong>Size</strong> <span>S</span> <span>M</span> <span>L</span> <span> XL</span> <span> 2XL</span>
                                    </div>
                                    <div class="stars-rating">
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star"></i>
                                       <i class="icofont icofont-star"></i> <span>(415)</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @endforeach
                       
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="hot-offers">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-6">
                  <a href="#">
                  <img src="{{asset('website/images/banner/'.$homeContent->banner1)}}" alt="">
                  </a>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-6">
                  <a href="#">
                  <img src="{{asset('website/images/banner/'.$homeContent->banner2)}}" alt="">
                  </a>
               </div>
            </div>
         </div>
      </section>
      <section class="categories-list">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-7">
                  <div class="single-categorie">
                     <div id="owl-carousel-featured" class="owl-carousel categories-list-page">
                        <div class="item">
                           <div class="h-100">
                              <div class="product-item">
                                 <span class="badge badge-danger offer-badge">HOT</span>	
                                 <div class="product-item-image">
                                    <span class="like-icon"><a href="#"> <i class="icofont icofont-heart"></i></a></span>
                                    <a href="#"><img class="card-img-top img-fluid" src="https://askbootstrap.com/preview/osahan-fashion/images/women/small/1.jpg" alt=""></a>
                                 </div>
                                 <div class="product-item-body">
                                    <div class="product-item-action">
                                       <a data-toggle="tooltip" data-placement="top" title="Add To Cart" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-shopping-cart"></i></a>
                                       <a data-toggle="tooltip" data-placement="top" title="View Detail" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-search-alt-2"></i></a>
                                    </div>
                                    <h4 class="card-title"><a href="#">Ipsums Dolors Untra</a></h4>
                                    <h5>
                                       <span class="product-desc-price">$529.99</span>
                                       <span class="product-price">$329.99</span>
                                       <span class="product-discount">30% Off</span>
                                    </h5>
                                 </div>
                                 <div class="product-item-footer">
                                    <div class="product-item-size">
                                       <strong>Size</strong> <span>S</span> <span>M</span> <span>L</span> <span> XL</span> <span> 2XL</span>
                                    </div>
                                    <div class="stars-rating">
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star"></i>
                                       <i class="icofont icofont-star"></i> <span>(415)</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="item">
                           <div class="h-100">
                              <div class="product-item">
                                 <span class="badge badge-info offer-badge">NEW</span>	
                                 <div class="product-item-image">
                                    <span class="like-icon"><a class="active" href="#"> <i class="icofont icofont-heart"></i></a></span>
                                    <a href="#"><img class="card-img-top img-fluid" src="https://askbootstrap.com/preview/osahan-fashion/images/women/small/2.jpg" alt=""></a>
                                 </div>
                                 <div class="product-item-body">
                                    <div class="product-item-action">
                                       <a data-toggle="tooltip" data-placement="top" title="Add To Cart" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-shopping-cart"></i></a>
                                       <a data-toggle="tooltip" data-placement="top" title="View Detail" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-search-alt-2"></i></a>
                                    </div>
                                    <h4 class="card-title"><a href="#">Ipsums Dolors Untra</a></h4>
                                    <h5>
                                       <span class="product-desc-price">$329.00</span>
                                       <span class="product-price">$201.00</span>
                                       <span class="product-discount">10% Off</span>
                                    </h5>
                                 </div>
                                 <div class="product-item-footer">
                                    <div class="product-item-size">
                                       <strong>Size</strong> <span>S</span> <span>M</span> <span>L</span> <span> XL</span> <span> 2XL</span>
                                    </div>
                                    <div class="stars-rating">
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star"></i>
                                       <i class="icofont icofont-star"></i>
                                       <i class="icofont icofont-star"></i> <span>(613)</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="item">
                           <div class="h-100">
                              <div class="product-item">
                                 <span class="badge badge-primary offer-badge">30% OFF</span>
                                 <div class="product-item-image">
                                    <span class="like-icon"><a href="#"> <i class="icofont icofont-heart"></i></a></span>
                                    <a href="#"><img class="card-img-top img-fluid" src="https://askbootstrap.com/preview/osahan-fashion/images/women/small/3.jpg" alt=""></a>
                                 </div>
                                 <div class="product-item-body">
                                    <div class="product-item-action">
                                       <a data-toggle="tooltip" data-placement="top" title="Add To Cart" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-shopping-cart"></i></a>
                                       <a data-toggle="tooltip" data-placement="top" title="View Detail" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-search-alt-2"></i></a>
                                    </div>
                                    <h4 class="card-title"><a href="#">Ipsums Dolors Untra</a></h4>
                                    <h5>
                                       <span class="product-desc-price">$229.00</span>
                                       <span class="product-price">$101.00</span>
                                       <span class="product-discount">20% Off</span>
                                    </h5>
                                 </div>
                                 <div class="product-item-footer">
                                    <div class="product-item-size">
                                       <strong>Size</strong> <span>S</span> <span>M</span> <span>L</span> <span> XL</span> <span> 2XL</span>
                                    </div>
                                    <div class="stars-rating">
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star"></i> <span>(613)</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="item">
                           <div class="h-100">
                              <div class="product-item">
                                 <span class="badge badge-default offer-badge">NEW</span>
                                 <div class="product-item-image">
                                    <span class="like-icon"><a href="#"> <i class="icofont icofont-heart"></i></a></span>
                                    <a href="#"><img class="card-img-top img-fluid" src="https://askbootstrap.com/preview/osahan-fashion/images/women/small/4.jpg" alt=""></a>
                                 </div>
                                 <div class="product-item-body">
                                    <div class="product-item-action">
                                       <a data-toggle="tooltip" data-placement="top" title="Add To Cart" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-shopping-cart"></i></a>
                                       <a data-toggle="tooltip" data-placement="top" title="View Detail" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-search-alt-2"></i></a>
                                    </div>
                                    <h4 class="card-title"><a href="#">Ipsums Dolors Untra</a></h4>
                                    <h5>
                                       <span class="product-desc-price">$200.00</span>
                                       <span class="product-price">$100.00</span>
                                       <span class="product-discount">50% Off</span>
                                    </h5>
                                 </div>
                                 <div class="product-item-footer">
                                    <div class="product-item-size">
                                       <strong>Size</strong> <span>S</span> <span>M</span> <span>L</span> <span> XL</span> <span> 2XL</span>
                                    </div>
                                    <div class="stars-rating">
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i> <span>(44)</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="item">
                           <div class="h-100">
                              <div class="product-item">
                                 <span class="badge badge-warning offer-badge">OFFERS</span>
                                 <div class="product-item-image">
                                    <span class="like-icon"><a href="#"> <i class="icofont icofont-heart"></i></a></span>
                                    <a href="#"><img class="card-img-top img-fluid" src="https://askbootstrap.com/preview/osahan-fashion/images/women/small/5.jpg" alt=""></a>
                                 </div>
                                 <div class="product-item-body">
                                    <div class="product-item-action">
                                       <a data-toggle="tooltip" data-placement="top" title="Add To Cart" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-shopping-cart"></i></a>
                                       <a data-toggle="tooltip" data-placement="top" title="View Detail" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-search-alt-2"></i></a>
                                    </div>
                                    <h4 class="card-title"><a href="#">Ipsums Dolors Untra</a></h4>
                                    <h5>
                                       <span class="product-desc-price">$430.00</span>
                                       <span class="product-price">$350.00</span>
                                       <span class="product-discount">20% Off</span>
                                    </h5>
                                 </div>
                                 <div class="product-item-footer">
                                    <div class="product-item-size">
                                       <strong>Size</strong> <span>S</span> <span>M</span> <span>L</span> <span> XL</span> <span> 2XL</span>
                                    </div>
                                    <div class="stars-rating">
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star"></i>
                                       <i class="icofont icofont-star"></i>
                                       <i class="icofont icofont-star"></i>
                                       <i class="icofont icofont-star"></i> <span>(150)</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="single-categorie">
                     <div id="owl-carousel-featured" class="owl-carousel categories-list-page">
                        <div class="item">
                           <div class="h-100">
                              <div class="product-item">
                                 <span class="badge badge-danger offer-badge">HOT</span>	
                                 <div class="product-item-image">
                                    <span class="like-icon"><a href="#"> <i class="icofont icofont-heart"></i></a></span>
                                    <a href="#"><img class="card-img-top img-fluid" src="https://askbootstrap.com/preview/osahan-fashion/images/women/small/1.jpg" alt=""></a>
                                 </div>
                                 <div class="product-item-body">
                                    <div class="product-item-action">
                                       <a data-toggle="tooltip" data-placement="top" title="Add To Cart" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-shopping-cart"></i></a>
                                       <a data-toggle="tooltip" data-placement="top" title="View Detail" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-search-alt-2"></i></a>
                                    </div>
                                    <h4 class="card-title"><a href="#">Ipsums Dolors Untra</a></h4>
                                    <h5>
                                       <span class="product-desc-price">$529.99</span>
                                       <span class="product-price">$329.99</span>
                                       <span class="product-discount">30% Off</span>
                                    </h5>
                                 </div>
                                 <div class="product-item-footer">
                                    <div class="product-item-size">
                                       <strong>Size</strong> <span>S</span> <span>M</span> <span>L</span> <span> XL</span> <span> 2XL</span>
                                    </div>
                                    <div class="stars-rating">
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star"></i>
                                       <i class="icofont icofont-star"></i> <span>(415)</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="item">
                           <div class="h-100">
                              <div class="product-item">
                                 <span class="badge badge-info offer-badge">NEW</span>	
                                 <div class="product-item-image">
                                    <span class="like-icon"><a class="active" href="#"> <i class="icofont icofont-heart"></i></a></span>
                                    <a href="#"><img class="card-img-top img-fluid" src="https://askbootstrap.com/preview/osahan-fashion/images/women/small/2.jpg" alt=""></a>
                                 </div>
                                 <div class="product-item-body">
                                    <div class="product-item-action">
                                       <a data-toggle="tooltip" data-placement="top" title="Add To Cart" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-shopping-cart"></i></a>
                                       <a data-toggle="tooltip" data-placement="top" title="View Detail" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-search-alt-2"></i></a>
                                    </div>
                                    <h4 class="card-title"><a href="#">Ipsums Dolors Untra</a></h4>
                                    <h5>
                                       <span class="product-desc-price">$329.00</span>
                                       <span class="product-price">$201.00</span>
                                       <span class="product-discount">10% Off</span>
                                    </h5>
                                 </div>
                                 <div class="product-item-footer">
                                    <div class="product-item-size">
                                       <strong>Size</strong> <span>S</span> <span>M</span> <span>L</span> <span> XL</span> <span> 2XL</span>
                                    </div>
                                    <div class="stars-rating">
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star"></i>
                                       <i class="icofont icofont-star"></i>
                                       <i class="icofont icofont-star"></i> <span>(613)</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="item">
                           <div class="h-100">
                              <div class="product-item">
                                 <span class="badge badge-primary offer-badge">30% OFF</span>
                                 <div class="product-item-image">
                                    <span class="like-icon"><a href="#"> <i class="icofont icofont-heart"></i></a></span>
                                    <a href="#"><img class="card-img-top img-fluid" src="https://askbootstrap.com/preview/osahan-fashion/images/women/small/3.jpg" alt=""></a>
                                 </div>
                                 <div class="product-item-body">
                                    <div class="product-item-action">
                                       <a data-toggle="tooltip" data-placement="top" title="Add To Cart" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-shopping-cart"></i></a>
                                       <a data-toggle="tooltip" data-placement="top" title="View Detail" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-search-alt-2"></i></a>
                                    </div>
                                    <h4 class="card-title"><a href="#">Ipsums Dolors Untra</a></h4>
                                    <h5>
                                       <span class="product-desc-price">$229.00</span>
                                       <span class="product-price">$101.00</span>
                                       <span class="product-discount">20% Off</span>
                                    </h5>
                                 </div>
                                 <div class="product-item-footer">
                                    <div class="product-item-size">
                                       <strong>Size</strong> <span>S</span> <span>M</span> <span>L</span> <span> XL</span> <span> 2XL</span>
                                    </div>
                                    <div class="stars-rating">
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star"></i> <span>(613)</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="item">
                           <div class="h-100">
                              <div class="product-item">
                                 <span class="badge badge-default offer-badge">NEW</span>
                                 <div class="product-item-image">
                                    <span class="like-icon"><a href="#"> <i class="icofont icofont-heart"></i></a></span>
                                    <a href="#"><img class="card-img-top img-fluid" src="https://askbootstrap.com/preview/osahan-fashion/images/women/small/4.jpg" alt=""></a>
                                 </div>
                                 <div class="product-item-body">
                                    <div class="product-item-action">
                                       <a data-toggle="tooltip" data-placement="top" title="Add To Cart" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-shopping-cart"></i></a>
                                       <a data-toggle="tooltip" data-placement="top" title="View Detail" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-search-alt-2"></i></a>
                                    </div>
                                    <h4 class="card-title"><a href="#">Ipsums Dolors Untra</a></h4>
                                    <h5>
                                       <span class="product-desc-price">$200.00</span>
                                       <span class="product-price">$100.00</span>
                                       <span class="product-discount">50% Off</span>
                                    </h5>
                                 </div>
                                 <div class="product-item-footer">
                                    <div class="product-item-size">
                                       <strong>Size</strong> <span>S</span> <span>M</span> <span>L</span> <span> XL</span> <span> 2XL</span>
                                    </div>
                                    <div class="stars-rating">
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i> <span>(44)</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="item">
                           <div class="h-100">
                              <div class="product-item">
                                 <span class="badge badge-warning offer-badge">OFFERS</span>
                                 <div class="product-item-image">
                                    <span class="like-icon"><a href="#"> <i class="icofont icofont-heart"></i></a></span>
                                    <a href="#"><img class="card-img-top img-fluid" src="https://askbootstrap.com/preview/osahan-fashion/images/women/small/5.jpg" alt=""></a>
                                 </div>
                                 <div class="product-item-body">
                                    <div class="product-item-action">
                                       <a data-toggle="tooltip" data-placement="top" title="Add To Cart" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-shopping-cart"></i></a>
                                       <a data-toggle="tooltip" data-placement="top" title="View Detail" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-search-alt-2"></i></a>
                                    </div>
                                    <h4 class="card-title"><a href="#">Ipsums Dolors Untra</a></h4>
                                    <h5>
                                       <span class="product-desc-price">$430.00</span>
                                       <span class="product-price">$350.00</span>
                                       <span class="product-discount">20% Off</span>
                                    </h5>
                                 </div>
                                 <div class="product-item-footer">
                                    <div class="product-item-size">
                                       <strong>Size</strong> <span>S</span> <span>M</span> <span>L</span> <span> XL</span> <span> 2XL</span>
                                    </div>
                                    <div class="stars-rating">
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star"></i>
                                       <i class="icofont icofont-star"></i>
                                       <i class="icofont icofont-star"></i>
                                       <i class="icofont icofont-star"></i> <span>(150)</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="single-categorie">
                     <div id="owl-carousel-featured" class="owl-carousel categories-list-page">
                        <div class="item">
                           <div class="h-100">
                              <div class="product-item">
                                 <span class="badge badge-danger offer-badge">HOT</span>	
                                 <div class="product-item-image">
                                    <span class="like-icon"><a href="#"> <i class="icofont icofont-heart"></i></a></span>
                                    <a href="#"><img class="card-img-top img-fluid" src="https://askbootstrap.com/preview/osahan-fashion/images/women/small/1.jpg" alt=""></a>
                                 </div>
                                 <div class="product-item-body">
                                    <div class="product-item-action">
                                       <a data-toggle="tooltip" data-placement="top" title="Add To Cart" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-shopping-cart"></i></a>
                                       <a data-toggle="tooltip" data-placement="top" title="View Detail" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-search-alt-2"></i></a>
                                    </div>
                                    <h4 class="card-title"><a href="#">Ipsums Dolors Untra</a></h4>
                                    <h5>
                                       <span class="product-desc-price">$529.99</span>
                                       <span class="product-price">$329.99</span>
                                       <span class="product-discount">30% Off</span>
                                    </h5>
                                 </div>
                                 <div class="product-item-footer">
                                    <div class="product-item-size">
                                       <strong>Size</strong> <span>S</span> <span>M</span> <span>L</span> <span> XL</span> <span> 2XL</span>
                                    </div>
                                    <div class="stars-rating">
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star"></i>
                                       <i class="icofont icofont-star"></i> <span>(415)</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="item">
                           <div class="h-100">
                              <div class="product-item">
                                 <span class="badge badge-info offer-badge">NEW</span>	
                                 <div class="product-item-image">
                                    <span class="like-icon"><a class="active" href="#"> <i class="icofont icofont-heart"></i></a></span>
                                    <a href="#"><img class="card-img-top img-fluid" src="https://askbootstrap.com/preview/osahan-fashion/images/women/small/2.jpg" alt=""></a>
                                 </div>
                                 <div class="product-item-body">
                                    <div class="product-item-action">
                                       <a data-toggle="tooltip" data-placement="top" title="Add To Cart" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-shopping-cart"></i></a>
                                       <a data-toggle="tooltip" data-placement="top" title="View Detail" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-search-alt-2"></i></a>
                                    </div>
                                    <h4 class="card-title"><a href="#">Ipsums Dolors Untra</a></h4>
                                    <h5>
                                       <span class="product-desc-price">$329.00</span>
                                       <span class="product-price">$201.00</span>
                                       <span class="product-discount">10% Off</span>
                                    </h5>
                                 </div>
                                 <div class="product-item-footer">
                                    <div class="product-item-size">
                                       <strong>Size</strong> <span>S</span> <span>M</span> <span>L</span> <span> XL</span> <span> 2XL</span>
                                    </div>
                                    <div class="stars-rating">
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star"></i>
                                       <i class="icofont icofont-star"></i>
                                       <i class="icofont icofont-star"></i> <span>(613)</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="item">
                           <div class="h-100">
                              <div class="product-item">
                                 <span class="badge badge-primary offer-badge">30% OFF</span>
                                 <div class="product-item-image">
                                    <span class="like-icon"><a href="#"> <i class="icofont icofont-heart"></i></a></span>
                                    <a href="#"><img class="card-img-top img-fluid" src="https://askbootstrap.com/preview/osahan-fashion/images/women/small/3.jpg" alt=""></a>
                                 </div>
                                 <div class="product-item-body">
                                    <div class="product-item-action">
                                       <a data-toggle="tooltip" data-placement="top" title="Add To Cart" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-shopping-cart"></i></a>
                                       <a data-toggle="tooltip" data-placement="top" title="View Detail" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-search-alt-2"></i></a>
                                    </div>
                                    <h4 class="card-title"><a href="#">Ipsums Dolors Untra</a></h4>
                                    <h5>
                                       <span class="product-desc-price">$229.00</span>
                                       <span class="product-price">$101.00</span>
                                       <span class="product-discount">20% Off</span>
                                    </h5>
                                 </div>
                                 <div class="product-item-footer">
                                    <div class="product-item-size">
                                       <strong>Size</strong> <span>S</span> <span>M</span> <span>L</span> <span> XL</span> <span> 2XL</span>
                                    </div>
                                    <div class="stars-rating">
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star"></i> <span>(613)</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="item">
                           <div class="h-100">
                              <div class="product-item">
                                 <span class="badge badge-default offer-badge">NEW</span>
                                 <div class="product-item-image">
                                    <span class="like-icon"><a href="#"> <i class="icofont icofont-heart"></i></a></span>
                                    <a href="#"><img class="card-img-top img-fluid" src="https://askbootstrap.com/preview/osahan-fashion/images/women/small/4.jpg" alt=""></a>
                                 </div>
                                 <div class="product-item-body">
                                    <div class="product-item-action">
                                       <a data-toggle="tooltip" data-placement="top" title="Add To Cart" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-shopping-cart"></i></a>
                                       <a data-toggle="tooltip" data-placement="top" title="View Detail" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-search-alt-2"></i></a>
                                    </div>
                                    <h4 class="card-title"><a href="#">Ipsums Dolors Untra</a></h4>
                                    <h5>
                                       <span class="product-desc-price">$200.00</span>
                                       <span class="product-price">$100.00</span>
                                       <span class="product-discount">50% Off</span>
                                    </h5>
                                 </div>
                                 <div class="product-item-footer">
                                    <div class="product-item-size">
                                       <strong>Size</strong> <span>S</span> <span>M</span> <span>L</span> <span> XL</span> <span> 2XL</span>
                                    </div>
                                    <div class="stars-rating">
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i> <span>(44)</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="item">
                           <div class="h-100">
                              <div class="product-item">
                                 <span class="badge badge-warning offer-badge">OFFERS</span>
                                 <div class="product-item-image">
                                    <span class="like-icon"><a href="#"> <i class="icofont icofont-heart"></i></a></span>
                                    <a href="#"><img class="card-img-top img-fluid" src="https://askbootstrap.com/preview/osahan-fashion/images/women/small/5.jpg" alt=""></a>
                                 </div>
                                 <div class="product-item-body">
                                    <div class="product-item-action">
                                       <a data-toggle="tooltip" data-placement="top" title="Add To Cart" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-shopping-cart"></i></a>
                                       <a data-toggle="tooltip" data-placement="top" title="View Detail" class="btn btn-theme-round btn-sm" href="#"><i class="icofont icofont-search-alt-2"></i></a>
                                    </div>
                                    <h4 class="card-title"><a href="#">Ipsums Dolors Untra</a></h4>
                                    <h5>
                                       <span class="product-desc-price">$430.00</span>
                                       <span class="product-price">$350.00</span>
                                       <span class="product-discount">20% Off</span>
                                    </h5>
                                 </div>
                                 <div class="product-item-footer">
                                    <div class="product-item-size">
                                       <strong>Size</strong> <span>S</span> <span>M</span> <span>L</span> <span> XL</span> <span> 2XL</span>
                                    </div>
                                    <div class="stars-rating">
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star"></i>
                                       <i class="icofont icofont-star"></i>
                                       <i class="icofont icofont-star"></i>
                                       <i class="icofont icofont-star"></i> <span>(150)</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  
               </div>
            </div>
         </div>
      </section>
      <section class="hot-offers light-bg text-center">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <a href="#">
                  <img src="{{asset('website/images/banner/'.$homeContent->banner3)}}" alt="">
                  </a>
               </div>
            </div>
         </div>
      </section>
      <section class="deals-of-the-day">
         <div class="container">
            <div class="section-header">
               <h5 class="heading-design-h5">
                  Now Trending
                  <div class="pull-right" id="countdown"></div>
               </h5>
            </div>
            <div class="row">
               <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="h-100">
                     <div class="product-item">
                        <div class="product-item-image">
                           <span class="like-icon"><a class="active" href="#"> <i class="icofont icofont-heart"></i></a></span>
                           <a href="#"><img class="card-img-top img-fluid" src="https://askbootstrap.com/preview/osahan-fashion/images/men/small/2.jpg" alt=""></a>
                        </div>
                        <div class="product-item-body">
                           <div class="product-item-action">
                              <a data-toggle="tooltip" data-placement="top" title="" class="btn btn-theme-round btn-sm" href="#" data-original-title="Add To Cart"><i class="icofont icofont-shopping-cart"></i></a>
                              <a data-toggle="tooltip" data-placement="top" title="" class="btn btn-theme-round btn-sm" href="#" data-original-title="View Detail"><i class="icofont icofont-search-alt-2"></i></a>
                           </div>
                           <h4 class="card-title"><a href="#">Ipsums Dolors Untra</a></h4>
                           <h5>
                              <span class="product-desc-price">$329.00</span>
                              <span class="product-price">$201.00</span>
                              <span class="product-discount">10% Off</span>
                           </h5>
                        </div>
                        <div class="product-item-footer">
                           <div class="product-item-size">
                              <strong>Size</strong> <span>S</span> <span>M</span> <span>L</span> <span> XL</span> <span> 2XL</span>
                           </div>
                           <div class="stars-rating">
                              <i class="icofont icofont-star active"></i>
                              <i class="icofont icofont-star active"></i>
                              <i class="icofont icofont-star"></i>
                              <i class="icofont icofont-star"></i>
                              <i class="icofont icofont-star"></i> <span>(613)</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="h-100">
                     <div class="product-item">
                        <div class="product-item-image">
                           <span class="like-icon"><a href="#"> <i class="icofont icofont-heart"></i></a></span>
                           <a href="#"><img class="card-img-top img-fluid" src="https://askbootstrap.com/preview/osahan-fashion/images/all-products/small/1.jpg" alt=""></a>
                        </div>
                        <div class="product-item-body">
                           <div class="product-item-action">
                              <a data-toggle="tooltip" data-placement="top" title="" class="btn btn-theme-round btn-sm" href="#" data-original-title="Add To Cart"><i class="icofont icofont-shopping-cart"></i></a>
                              <a data-toggle="tooltip" data-placement="top" title="" class="btn btn-theme-round btn-sm" href="#" data-original-title="View Detail"><i class="icofont icofont-search-alt-2"></i></a>
                           </div>
                           <h4 class="card-title"><a href="#">Ipsums Dolors Untra</a></h4>
                           <h5>
                              <span class="product-desc-price">$529.99</span>
                              <span class="product-price">$329.99</span>
                              <span class="product-discount">30% Off</span>
                           </h5>
                        </div>
                        <div class="product-item-footer">
                           <div class="product-item-size">
                              <strong>Size</strong> <span>ONE SIZE</span>
                           </div>
                           <div class="stars-rating">
                              <i class="icofont icofont-star active"></i>
                              <i class="icofont icofont-star active"></i>
                              <i class="icofont icofont-star active"></i>
                              <i class="icofont icofont-star"></i>
                              <i class="icofont icofont-star"></i> <span>(415)</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="h-100">
                     <div class="product-item">
                        <div class="product-item-image">
                           <span class="like-icon"><a href="#"> <i class="icofont icofont-heart"></i></a></span>
                           <a href="#"><img class="card-img-top img-fluid" src="https://askbootstrap.com/preview/osahan-fashion/images/all-products/small/4.jpg" alt=""></a>
                        </div>
                        <div class="product-item-body">
                           <div class="product-item-action">
                              <a data-toggle="tooltip" data-placement="top" title="" class="btn btn-theme-round btn-sm" href="#" data-original-title="Add To Cart"><i class="icofont icofont-shopping-cart"></i></a>
                              <a data-toggle="tooltip" data-placement="top" title="" class="btn btn-theme-round btn-sm" href="#" data-original-title="View Detail"><i class="icofont icofont-search-alt-2"></i></a>
                           </div>
                           <h4 class="card-title"><a href="#">Ipsums Dolors Untra</a></h4>
                           <h5>
                              <span class="product-desc-price">$630.00</span>
                              <span class="product-price">$350.00</span>
                              <span class="product-discount">5% Off</span>
                           </h5>
                        </div>
                        <div class="product-item-footer">
                           <div class="product-item-size">
                              <strong>Size</strong> <span>10</span> <span>9</span> <span>8</span> <span>7</span> <span>6</span>
                           </div>
                           <div class="stars-rating">
                              <i class="icofont icofont-star active"></i>
                              <i class="icofont icofont-star active"></i>
                              <i class="icofont icofont-star active"></i>
                              <i class="icofont icofont-star active"></i>
                              <i class="icofont icofont-star"></i> <span>(300)</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="h-100">
                     <div class="product-item">
                        <div class="product-item-image">
                           <span class="like-icon"><a href="#"> <i class="icofont icofont-heart"></i></a></span>
                           <a href="#"><img class="card-img-top img-fluid" src="https://askbootstrap.com/preview/osahan-fashion/images/women/small/3.jpg" alt=""></a>
                        </div>
                        <div class="product-item-body">
                           <div class="product-item-action">
                              <a data-toggle="tooltip" data-placement="top" title="" class="btn btn-theme-round btn-sm" href="#" data-original-title="Add To Cart"><i class="icofont icofont-shopping-cart"></i></a>
                              <a data-toggle="tooltip" data-placement="top" title="" class="btn btn-theme-round btn-sm" href="#" data-original-title="View Detail"><i class="icofont icofont-search-alt-2"></i></a>
                           </div>
                           <h4 class="card-title"><a href="#">Ipsums Dolors Untra</a></h4>
                           <h5>
                              <span class="product-desc-price">$229.00</span>
                              <span class="product-price">$101.00</span>
                              <span class="product-discount">20% Off</span>
                           </h5>
                        </div>
                        <div class="product-item-footer">
                           <div class="product-item-size">
                              <strong>Size</strong> <span>S</span> <span>M</span> <span>L</span> <span> XL</span> <span> 2XL</span>
                           </div>
                           <div class="stars-rating">
                              <i class="icofont icofont-star active"></i>
                              <i class="icofont icofont-star active"></i>
                              <i class="icofont icofont-star active"></i>
                              <i class="icofont icofont-star active"></i>
                              <i class="icofont icofont-star"></i> <span>(613)</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
     

      @endsection
      