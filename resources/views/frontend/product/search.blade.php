@extends('frontend.layout.master')
@section('content') 
<!-- product category -->
<section id="aa-product-category">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
        <div class="aa-product-catg-content">
          <div class="aa-product-catg-head">
            <div class="aa-product-catg-head-left">
              <form action="" class="aa-sort-form">
                <label for="">Sắp xếp</label>
                <select name="">
                  <option value="1" selected="Default">Mặc định</option>
                  <option value="2">Tên</option>
                  <option value="3">Giá</option>
                  <option value="4">Ngày</option>
                </select>
              </form>
              <form action="" class="aa-show-form">
                <label for="">Show</label>
                <select name="">
                  <option value="1" selected="12">12</option>
                  <option value="2">24</option>
                  <option value="3">36</option>
                </select>
              </form>
            </div>
            <div class="aa-product-catg-head-right">
              <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
              <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
            </div>
          </div>
          <div class="aa-product-catg-body">
            <ul class="aa-product-catg">
              @foreach ($products as $item)
                <li>
                  <figure>
                    <a class="aa-product-img" href="{{ route('frontend.detailproduct', ['id'=>$item->id]) }}"><img style="width: 250px;height: 300px;" src="{{ $item->link_image }}" alt="polo shirt img"></a>
                    {{--  <button style="width: 250px;margin-left: 5px" class="aa-add-card-btn" onclick="return addcart(this);" id="{{ $item->id }}" value="{{ $item->id }}">Thêm vào giỏ hàng</button>  --}}
                    {{--  <a class="aa-add-card-btn"  href="{{ route('frontend.addcart', ['id'=>$item->id]) }}" id="{{ $item->id }}" value="{{ $item->id }}"><span class="fa fa-shopping-cart"></span>Thêm vào giỏ hàng</a>  --}}
                    <figcaption>
                      <h4 class="aa-product-title"><a href="{{ route('frontend.detailproduct', ['id'=>$item->id]) }}">{{ $item->product_name }}</a></h4>
                      @if ($item->sale_percent > 0)
                        <span class="aa-product-price">{{ number_format(($item->price * (100-$item->sale_percent))/100) }} vnđ</span>
                        <span class="aa-product-price"><del>{{ number_format($item->price) }} vnđ</del></span>
                      @else
                        <span class="aa-product-price">{{ number_format($item->price) }} vnđ</span>
                      @endif
                      <p class="aa-product-descrip">{{ $item->short_description }}</p>
                    </figcaption>
                  </figure>                         
                  <div class="aa-product-hvr-content">
                    <a href="{{ route('frontend.addwishlist', ['id'=>$item->id]) }}" data-toggle="tooltip" data-placement="top" title="Thêm vào yêu thích"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Xem nhanh" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                  </div>
                  <!-- product badge -->
                    @php
                        $total = 0;
                        $sold = 0;
                    @endphp
                    @foreach ($item->detail_product as $iv)
                      @php
                        $total = ($iv->quantity - $iv->sold) + $total;
                        $sold += $iv->sold;
                      @endphp
                    @endforeach
                    @if ($total<=0)
                      <span class="aa-badge aa-sold-out" href="#">Hết hàng!</span>
                    @elseif ($total > 0 && $sold > 10)
                      <span class="aa-badge aa-hot" href="#">HOT!</span>
                    @elseif ($item->sale_percent > 0 && $total > 0)
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                    @endif
                </li> 
              @endforeach                         
            </ul>
            @if($products != null)
                <nav aria-label="Page navigation" style="text-align: center">
                    <b>{{$products->links() }}</b>
                </nav>
            @endif
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
      <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
        <aside class="aa-sidebar">
          <!-- single sidebar -->
          <div class="aa-sidebar-widget">
            <h3>Danh mục</h3>
            <ul class="aa-catg-nav">
              @foreach ($categories as $item)
                <li style="margin-top: 2px"><a href="{{ route('frontend.detailcategory', ['slug_name'=>$item->slug_name]) }}">{{ $item->category_name }}</a></li>
              @endforeach
            </ul>
          </div>
          <!-- single sidebar -->
          {{--  <div class="aa-sidebar-widget">
            <h3>Tags</h3>
            <div class="tag-cloud">
              <a href="#">Fashion</a>
              <a href="#">Ecommerce</a>
              <a href="#">Shop</a>
              <a href="#">Hand Bag</a>
              <a href="#">Laptop</a>
              <a href="#">Head Phone</a>
              <a href="#">Pen Drive</a>
            </div>
          </div>  --}}
          <!-- single sidebar -->
          <div class="aa-sidebar-widget">
            <h3>Lọc theo giá</h3>              
            <!-- price range -->
            <div class="aa-sidebar-price-range">
             <form action="">
                <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                </div>
                <span id="skip-value-lower" class="example-val">30.00</span>
               <span id="skip-value-upper" class="example-val">100.00</span>
               <button class="aa-filter-btn" type="submit">Lọc</button>
             </form>
            </div>              

          </div>
          <!-- single sidebar -->
          <div class="aa-sidebar-widget">
            <h3>Lọc theo màu</h3>
            <div class="aa-color-tag">
              <a class="aa-color-green" href="#"></a>
              <a class="aa-color-yellow" href="#"></a>
              <a class="aa-color-pink" href="#"></a>
              <a class="aa-color-purple" href="#"></a>
              <a class="aa-color-blue" href="#"></a>
              <a class="aa-color-orange" href="#"></a>
              <a class="aa-color-gray" href="#"></a>
              <a class="aa-color-black" href="#"></a>
              <a class="aa-color-white" href="#"></a>
              <a class="aa-color-cyan" href="#"></a>
              <a class="aa-color-olive" href="#"></a>
              <a class="aa-color-orchid" href="#"></a>
            </div>                            
          </div>
          <!-- single sidebar -->
          <div class="aa-sidebar-widget">
            <h3>Xem gần đây</h3>
            <div class="aa-recently-views">
              <ul>
                <li>
                  <a href="#" class="aa-cartbox-img"><img alt="img" src="sources/img/woman-small-2.jpg"></a>
                  <div class="aa-cartbox-info">
                    <h4><a href="#">Product Name</a></h4>
                    <p>1 x $250</p>
                  </div>                    
                </li>
                <li>
                  <a href="#" class="aa-cartbox-img"><img alt="img" src="sources/img/woman-small-1.jpg"></a>
                  <div class="aa-cartbox-info">
                    <h4><a href="#">Product Name</a></h4>
                    <p>1 x $250</p>
                  </div>                    
                </li>
                 <li>
                  <a href="#" class="aa-cartbox-img"><img alt="img" src="sources/img/woman-small-2.jpg"></a>
                  <div class="aa-cartbox-info">
                    <h4><a href="#">Product Name</a></h4>
                    <p>1 x $250</p>
                  </div>                    
                </li>                                      
              </ul>
            </div>                            
          </div>
          <!-- single sidebar -->
          <div class="aa-sidebar-widget">
            <h3>Top đánh giá</h3>
            <div class="aa-recently-views">
              <ul>
                <li>
                  <a href="#" class="aa-cartbox-img"><img alt="img" src="sources/img/woman-small-2.jpg"></a>
                  <div class="aa-cartbox-info">
                    <h4><a href="#">Product Name</a></h4>
                    <p>1 x $250</p>
                  </div>                    
                </li>
                <li>
                  <a href="#" class="aa-cartbox-img"><img alt="img" src="sources/img/woman-small-1.jpg"></a>
                  <div class="aa-cartbox-info">
                    <h4><a href="#">Product Name</a></h4>
                    <p>1 x $250</p>
                  </div>                    
                </li>
                 <li>
                  <a href="#" class="aa-cartbox-img"><img alt="img" src="sources/img/woman-small-2.jpg"></a>
                  <div class="aa-cartbox-info">
                    <h4><a href="#">Product Name</a></h4>
                    <p>1 x $250</p>
                  </div>                    
                </li>                                      
              </ul>
            </div>                            
          </div>
        </aside>
      </div>
     
    </div>
  </div>
</section>
<!-- / product category -->
@endsection
{{--  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    function addcart(e){
      var id = e.value;
      $.ajax({
        url: "{{route('frontend.addcart')}}",
        data:{
          id:id
        },
        success: function(data){
          document.getElementById('cartttt').innerHTML = data; 
        }
      });
    }
</script>  --}}