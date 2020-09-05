@extends('frontend.layout.master')
@section('content') 
<!-- product category -->
<section id="aa-product-details">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-product-details-area">
          <div class="aa-product-details-content">
            <div class="row">
              <!-- Modal view slider -->
              <div class="col-md-5 col-sm-5 col-xs-12">                              
                <div class="aa-product-view-slider">                                
                  <div id="demo-1" class="simpleLens-gallery-container">
                    <div class="simpleLens-container">
                      <div class="simpleLens-big-image-container"><a data-lens-image="{{ $product->link_image }}" class="simpleLens-lens-image"><img src="{{ $product->link_image }}" class="simpleLens-big-image"></a></div>
                    </div>
                    <div class="simpleLens-thumbnails-container">
                        <a data-big-image="{{ $product->link_image }}" data-lens-image="{{ $product->link_image }}" class="simpleLens-thumbnail-wrapper" href="#">
                          <img class="small" src="{{ $product->link_image }}">
                        </a>                                    
                        <a data-big-image="https://www.sporter.vn/wp-content/uploads/2017/06/Ao-real-san-nha-1-4-600x600.jpg" data-lens-image="https://www.sporter.vn/wp-content/uploads/2017/06/Ao-real-san-nha-1-4-600x600.jpg" class="simpleLens-thumbnail-wrapper" href="#">
                          <img class="small" src="https://www.sporter.vn/wp-content/uploads/2017/06/Ao-real-san-nha-1-4-600x600.jpg">
                        </a>
                        <a data-big-image="https://www.sporter.vn/wp-content/uploads/2017/06/Ao-real-san-nha-2-4-600x600.jpg" data-lens-image="https://www.sporter.vn/wp-content/uploads/2017/06/Ao-real-san-nha-2-4-600x600.jpg" class="simpleLens-thumbnail-wrapper" href="#">
                          <img class="small" src="https://www.sporter.vn/wp-content/uploads/2017/06/Ao-real-san-nha-2-4-600x600.jpg">
                        </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal view content -->
              <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="aa-product-view-content">
                  <h3>{{ $product->product_name }}</h3>
                  <div class="aa-price-block">
                    @if ($product->sale_percent>0)
                      <span style="color: red" class="aa-product-price">{{ number_format(($product->price * (100 - $product->sale_percent))/100) }} vnđ</span><span style="margin-left: 10px" class="aa-product-price"><del>{{ number_format($product->price) }} vnđ</del></span>
                    @else
                      <span class="aa-product-price">{{ number_format($product->price) }} vnđ</span>
                    @endif
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($product->detail_product as $item)
                      @php
                        $total = ($item->quantity - $item->sold) + $total
                      @endphp
                    @endforeach
                    
                    @if ($total <= 0)
                      <p style="margin-top: 10px" class="aa-product-avilability">Trạng thái: <span style="color: red">Hết hàng</span></p>
                    @else 
                      <p style="margin-top: 10px" class="aa-product-avilability">Trạng thái: <span>Còn hàng</span></p>
                    @endif
                  </div>
                  <p>{{ $product->short_description }}</p>
                  {{--  <h4>Color</h4>
                  <div class="aa-color-tag">
                    <a href="#" class="aa-color-green"></a>
                    <a href="#" class="aa-color-yellow"></a>
                    <a href="#" class="aa-color-pink"></a>                      
                    <a href="#" class="aa-color-black"></a>
                    <a href="#" class="aa-color-white"></a>                      
                  </div>  --}}
                  <h4>Size</h4>
                  <div class="aa-prod-view-size">
                    @foreach ($product->detail_product as $item)
                      {{--  <a href="#">{{ $item->size }}</a>  --}}
                      <input type="radio" name="size" value="{{ $item->size }}"><span style="display: inline;margin-right: 30px">{{ $item->size }}</span>
                    @endforeach
                  </div>
                  <div class="aa-prod-quantity">
                    <form action="">
                      <select id="" name="">
                        <option selected="1" value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>
                    </form>
                    <p class="aa-prod-category">
                      Danh mục : <a href="{{ route('frontend.detailcategory', ['slug_name'=>$product->large_category_product->slug_name]) }}">{{ $product->large_category_product->large_category_name }}</a>
                    </p>
                  </div>
                  <div class="aa-prod-view-bottom">
                    <a class="aa-add-to-cart-btn" href="{{ route('frontend.addcart', ['id'=>$product->id]) }}">Thêm vào giỏ hàng</a>
                    <a class="aa-add-to-cart-btn" href="{{ route('frontend.addwishlist', ['id'=>$product->id]) }}">Thêm vào yêu thích</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="aa-product-details-bottom">
            <ul class="nav nav-tabs" id="myTab2">
              <li><a href="#description" data-toggle="tab">Mô tả sản phẩm</a></li>
              <li><a href="#review" data-toggle="tab">Đánh giá</a></li>                
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane fade in active" id="description">
              {{ $product->description }}
              </div>
              <div class="tab-pane fade " id="review">
               <div class="aa-product-review-area">
                  @if ($reviews)
                    <h4>{{ count($reviews) }} Đánh giá </h4> 
                  @else
                    <h4>0 Đánh giá </h4> 
                  @endif
                 <ul class="aa-review-nav">
                    @if ($reviews)
                       @foreach ($reviews as $item)
                        <li>
                          <div class="media">
                            <div class="media-left">
                              <a href="#">
                                <img class="media-object" src="{{ $item->user->image_profile }}" alt="girl image">
                              </a>
                            </div>
                            <div class="media-body"> 
                              <h4 class="media-heading"><strong>{{ $item->user->fullname }}</strong> - <span>{{ $item->created_at }}</span></h4>
                              <div class="aa-product-rating">
                                @for ($i = 0; $i < $item->star; $i++)
                                  <span class="fa fa-star"></span>
                                @endfor
                                @for ($i = 0; $i < 5 - $item->star; $i++)
                                  <span class="fa fa-star-o"></span>
                                @endfor
                              </div>
                              <p>{{ $item->content }}</p>
                            </div>
                          </div>
                        </li>
                       @endforeach
                   @endif
                 </ul>
                 @if($reviews != null)
                      <nav aria-label="Page navigation" style="text-align: center">
                          <b>{{$reviews->links() }}</b>
                      </nav>
                  @endif
                 <h4>Thêm đánh giá</h4>
                 @if (Auth::check())
                  <form action="{{ route('frontend.rating') }}" method="POST" class="aa-review-form">
                    @csrf
                    <input name="id_product" style="display: none" value="{{ $product->id }}" type="text">
                    <div class="aa-your-rating">
                    <p>Đánh giá</p>
                    <input type="radio" name="star" value="1">
                    <input type="radio" name="star" value="2">
                    <input type="radio" name="star" value="3">
                    <input type="radio" name="star" value="4">
                    <input type="radio" name="star" value="5">
                    {{--  <a href="#"><span class="fa fa-star-o"></span></a>
                    <a href="#"><span class="fa fa-star-o"></span></a>
                    <a href="#"><span class="fa fa-star-o"></span></a>
                    <a href="#"><span class="fa fa-star-o"></span></a>
                    <a href="#"><span class="fa fa-star-o"></span></a>  --}}
                    </div>
                  </div>
                  <!-- review form -->
                    <div style="margin-top: 10px" class="form-group">
                      <label for="message">Nội dung</label>
                      <textarea name="content" class="form-control" rows="3" id="message"></textarea>
                    </div>
                      <input name="id_user" style="display: none" value="{{ Auth::user()->id }}" type="text">
                      <div class="form-group">
                        <label for="name">Họ tên</label>
                        <input name="name" readonly type="text" class="form-control" id="name" value="{{ Auth::user()->fullname }}">
                      </div>  
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" readonly type="email" class="form-control" id="email" value="{{ Auth::user()->email }}">
                      </div>
                    <button style="width: 100%;margin-bottom: 30px;background: #ff6666" type="submit" class="btn btn-default aa-review-submit">Gửi</button>
                  </form>
                 @else
                  <form action="{{ route('frontend.rating') }}" method="POST" class="aa-review-form">
                    @csrf
                    <input name="id_product" style="display: none" value="{{ $product->id }}" type="text">
                    <div class="aa-your-rating">
                    <p>Đánh giá</p>
                    <input type="radio" name="star" value="1">
                    <input type="radio" name="star" value="2">
                    <input type="radio" name="star" value="3">
                    <input type="radio" name="star" value="4">
                    <input type="radio" name="star" value="5">
                    {{--  <a href="#"><span class="fa fa-star-o"></span></a>
                    <a href="#"><span class="fa fa-star-o"></span></a>
                    <a href="#"><span class="fa fa-star-o"></span></a>
                    <a href="#"><span class="fa fa-star-o"></span></a>
                    <a href="#"><span class="fa fa-star-o"></span></a>  --}}
                    </div>
                  </div>
                  <!-- review form -->
                    <div style="margin-top: 10px" class="form-group">
                      <label for="message">Nội dung</label>
                      <textarea name="content" class="form-control" rows="3" id="message"></textarea>
                    </div>
                      <div class="form-group">
                        <label for="name">Họ tên</label>
                        <input name="name" type="text" class="form-control" id="name" value="">
                      </div>  
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="email" class="form-control" id="email" value="">
                      </div>
                    <button style="width: 100%;margin-bottom: 30px;background: #ff6666" type="submit" class="btn btn-default aa-review-submit">Gửi</button>
                  </form>
                 @endif
               </div>
              </div>            
            </div>
          </div>
          <!-- Related product -->
          <div class="aa-product-related-item">
            <h3>Sản phẩm tương tự</h3>
            <ul class="aa-product-catg aa-related-item-slider">
              <!-- start single product item -->
              @php
                  $start = 0;
              @endphp
              @foreach ($same_product as $item)
                @if ($item->id != $product->id)
                  <li>
                    <figure>
                      <a class="aa-product-img" href="{{ route('frontend.detailproduct', ['id'=>$item->id]) }}"><img style="width: 250px;height: 300px;" src="{{ $item->link_image }}" alt="polo shirt img"></a>
                      <figcaption>
                        <h4 class="aa-product-title"><a href="{{ route('frontend.detailproduct', ['id'=>$item->id]) }}">{{ $item->product_name }}</a></h4>
                        @if ($item->sale_percent>0)
                          <span class="aa-product-price">{{ number_format(($item->price * (100 - $item->sale_percent))/100) }} vnđ</span><span class="aa-product-price"><del>{{ number_format($item->price) }} vnđ</del></span>
                        @else
                          <span class="aa-product-price">{{ number_format($item->price) }} vnđ</span>
                        @endif
                      </figcaption>
                    </figure>                     
                    <div class="aa-product-hvr-content">
                      <a href="{{ route('frontend.addwishlist', ['id'=>$item->id]) }}" data-toggle="tooltip" data-placement="top" title="Thêm vào yêu thích"><span class="fa fa-heart-o"></span></a>
                      {{--  <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>  --}}
                      <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                    </div>
                    <!-- product badge -->
                    {{--  <span class="aa-badge aa-sale" href="#">SALE!</span>  --}}
                  </li>   
                  @php
                      $start++;
                  @endphp
                  @if ($start == 5)
                      @break
                  @endif
                @endif
              @endforeach                                 
            </ul>
            <!-- quick view modal -->                  
            <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">                      
                  <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="row">
                      <!-- Modal view slider -->
                      <div class="col-md-6 col-sm-6 col-xs-12">                              
                        <div class="aa-product-view-slider">                                
                          <div class="simpleLens-gallery-container" id="demo-1">
                            <div class="simpleLens-container">
                                <div class="simpleLens-big-image-container">
                                    <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                        <img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                    </a>
                                </div>
                            </div>
                            <div class="simpleLens-thumbnails-container">
                                <a href="#" class="simpleLens-thumbnail-wrapper"
                                   data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                   data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                    <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                                </a>                                    
                                <a href="#" class="simpleLens-thumbnail-wrapper"
                                   data-lens-image="img/view-slider/large/polo-shirt-3.png"
                                   data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                    <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                                </a>

                                <a href="#" class="simpleLens-thumbnail-wrapper"
                                   data-lens-image="img/view-slider/large/polo-shirt-4.png"
                                   data-big-image="img/view-slider/medium/polo-shirt-4.png">
                                    <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                                </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Modal view content -->
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="aa-product-view-content">
                          <h3>T-Shirt</h3>
                          <div class="aa-price-block">
                            <span class="aa-product-view-price">$34.99</span>
                            <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                          <h4>Size</h4>
                          <div class="aa-prod-view-size">
                            <a href="#">S</a>
                            <a href="#">M</a>
                            <a href="#">L</a>
                            <a href="#">XL</a>
                          </div>
                          <div class="aa-prod-quantity">
                            <form action="">
                              <select name="" id="">
                                <option value="0" selected="1">1</option>
                                <option value="1">2</option>
                                <option value="2">3</option>
                                <option value="3">4</option>
                                <option value="4">5</option>
                                <option value="5">6</option>
                              </select>
                            </form>
                            <p class="aa-prod-category">
                              Category: <a href="#">Polo T-Shirt</a>
                            </p>
                          </div>
                          <div class="aa-prod-view-bottom">
                            <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                            <a href="#" class="aa-add-to-cart-btn">View Details</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>                        
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
            <!-- / quick view modal -->   
          </div>  
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / product category -->
@endsection