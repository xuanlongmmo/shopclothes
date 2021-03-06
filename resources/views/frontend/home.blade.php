@extends('frontend.layout.master')
@section('content') 
<!-- Start slider -->
  <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->
            @if ($large_banners)
                @foreach ($large_banners as $item)
                  <li>
                    <div class="seq-model">
                      <img data-seq src="{{ $item->link_image }}" alt="Men slide img" />
                    </div>
                    <div class="seq-title">
                    <span data-seq>{{ $item->infor }}</span>                
                      <h2 data-seq>{{ $item->title }}</h2>                
                      <p data-seq>{{ $item->description }}</p>
                      <a data-seq href="{{ $item->link }}" class="aa-shop-now-btn aa-secondary-btn">Xem ngay</a>
                    </div>
                  </li>  
                @endforeach
            @endif           
          </ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>
  <!-- / slider -->
  <!-- Start Promo section -->
  <section id="aa-promo">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-promo-area">
            <div class="row">
              @if ($small_banners)
              <!-- promo left -->
              <div class="col-md-5 no-padding">                
                <div class="aa-promo-left">
                  <div class="aa-promo-banner">                    
                    <img src="{{ $small_banners[0]->link_image }}" alt="img">                    
                    <div class="aa-prom-content">
                      <span>{{ $small_banners[0]->infor }}</span>
                      <h4><a href="{{ $small_banners[0]->link }}">{{ $small_banners[0]->title}}</a></h4>                      
                    </div>
                  </div>
                </div>
              </div>
              <!-- promo right -->
              <div class="col-md-7 no-padding">
                <div class="aa-promo-right">
                  @for ($i = 1; $i <= 4; $i++)
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="{{ $small_banners[$i]->link_image }}" alt="img">                      
                      <div class="aa-prom-content">
                        <span>{{ $small_banners[$i]->infor }}</span>
                        <h4><a href="{{ $small_banners[$i]->link }}">{{ $small_banners[$i]->title }}</a></h4>                        
                      </div>
                    </div>
                  </div>
                  @endfor
                </div>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Promo section -->
  <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab">
                   @for ($i = 0; $i < count($section_category); $i++)
                       @if ($i==0)
                        <li class="active"><a href="#{{ $section_category[$i]->tag }}" data-toggle="tab">{{ $section_category[$i]->name }}</a></li>  
                       @else
                        <li><a href="#{{ $section_category[$i]->tag }}" data-toggle="tab">{{ $section_category[$i]->name }}</a></li>
                       @endif
                   @endfor
                    {{--  <li><a href="#women" data-toggle="tab">Women</a></li>
                    <li><a href="#sports" data-toggle="tab">Sports</a></li>
                    <li><a href="#electronics" data-toggle="tab">Electronics</a></li>  --}}
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    @for ($i = 0; $i < count($section_category); $i++)
                       @if ($i==0)
                       <!-- Start active product category -->
                       <div class="tab-pane fade in active" id="{{ $section_category[$i]->tag }}">
                         <ul class="aa-product-catg">
                           <!-- start single product item -->
                           @php
                                $count = 0;
                           @endphp
                           @foreach ($section_category[$i]->section_content as $item)
                            @foreach ($item->product as $product)
                            @php
                                $count++;
                            @endphp
                            <li>
                              <figure>
                                <a class="aa-product-img" href="#"><img style="height: 300px;width: 250px;" src="{{ $product->link_image }}" alt="polo shirt img"></a>
                                  <figcaption>
                                  <h4 class="aa-product-title"><a href="{{ route('frontend.detailproduct', ['id'=>$product->id]) }}">{{ $product->product_name }}</a></h4>
                                  @if ($product->sale_percent > 0)
                                    <span class="aa-product-price">{{ number_format($product->price/100 * (100-$product->sale_percent)) }} đ</span><span class="aa-product-price"><del>{{ number_format($product->price) }} đ</del></span>
                                  @else
                                    <span class="aa-product-price">{{ number_format($product->price) }} đ</span> 
                                  @endif
                                </figcaption>
                              </figure>                        
                              <div class="aa-product-hvr-content">
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                          
                              </div>
                              <!-- product badge -->
                              @if($product->quantity - $product->sold <= 0)
                                <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                              @elseif ($product->sale_percent > 0)
                                <span class="aa-badge aa-sale" href="#">SALE!</span> 
                              @endif
                              {{--  <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                              <span class="aa-badge aa-hot" href="#">HOT!</span>  --}}
                            </li>
                            @endforeach
                            @if ($count==8)
                                @break
                            @endif
                           @endforeach
                           <!-- start single product item -->
                         </ul>
                         {{--  <a class="aa-browse-btn" href="#">Xem toàn bộ sản phẩm <span class="fa fa-long-arrow-right"></span></a>  --}}
                       </div>
                       <!-- / Active product category -->
                      @else
                       <!-- start women product category -->
                       <div class="tab-pane fade" id="{{ $section_category[$i]->tag }}">
                         <ul class="aa-product-catg">
                           <!-- start single product item -->
                           @php
                                $count = 0;
                           @endphp
                           @foreach ($section_category[$i]->section_content as $item)
                            @foreach ($item->product as $product)
                            @php
                                $count++;
                            @endphp
                            <li>
                              <figure>
                                <a class="aa-product-img" href="#"><img style="height: 300px;width: 250px;" src="{{ $product->link_image }}" alt="polo shirt img"></a>
                                  <figcaption>
                                  <h4 class="aa-product-title"><a href="{{ route('frontend.detailproduct', ['id'=>$product->id]) }}">{{ $product->product_name }}</a></h4>
                                  @if ($product->sale_percent > 0)
                                    <span class="aa-product-price">{{ number_format($product->price/100 * (100-$product->sale_percent)) }} đ</span><span class="aa-product-price"><del>{{ number_format($product->price) }} đ</del></span>
                                  @else
                                    <span class="aa-product-price">{{ number_format($product->price) }} đ</span> 
                                  @endif
                                </figcaption>
                              </figure>                        
                              <div class="aa-product-hvr-content">
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                          
                              </div>
                              <!-- product badge -->
                              @if($product->quantity - $product->sold <= 0)
                                <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                              @elseif ($product->sale_percent > 0)
                                <span class="aa-badge aa-sale" href="#">SALE!</span> 
                              @endif
                              {{--  <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                              <span class="aa-badge aa-hot" href="#">HOT!</span>  --}}
                            </li>
                            @endforeach
                            @if ($count==8)
                                @break
                            @endif
                           @endforeach
                           <!-- start single product item -->
                         </ul>
                         {{--  <a class="aa-browse-btn" href="#">Xem toàn bộ sản phẩm <span class="fa fa-long-arrow-right"></span></a>  --}}
                       </div>
                       <!-- / women product category -->
                       @endif
                   @endfor
                  </div>
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
                                          <a class="simpleLens-lens-image" data-lens-image="sources/img/view-slider/large/polo-shirt-1.png">
                                              <img src="sources/img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                          </a>
                                      </div>
                                  </div>
                                  <div class="simpleLens-thumbnails-container">
                                      <a href="#" class="simpleLens-thumbnail-wrapper"
                                         data-lens-image="sources/img/view-slider/large/polo-shirt-1.png"
                                         data-big-image="sources/img/view-slider/medium/polo-shirt-1.png">
                                          <img src="sources/img/view-slider/thumbnail/polo-shirt-1.png">
                                      </a>                                    
                                      <a href="#" class="simpleLens-thumbnail-wrapper"
                                         data-lens-image="sources/img/view-slider/large/polo-shirt-3.png"
                                         data-big-image="sources/img/view-slider/medium/polo-shirt-3.png">
                                          <img src="sources/img/view-slider/thumbnail/polo-shirt-3.png">
                                      </a>

                                      <a href="#" class="simpleLens-thumbnail-wrapper"
                                         data-lens-image="sources/img/view-slider/large/polo-shirt-4.png"
                                         data-big-image="sources/img/view-slider/medium/polo-shirt-4.png">
                                          <img src="sources/img/view-slider/thumbnail/polo-shirt-4.png">
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
                  </div><!-- / quick view modal -->              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Products section -->
  <!-- banner section -->
  <section id="aa-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">        
          <div class="row">
            <div class="aa-banner-area">
            <a href="#"><img style="width: 1170px;height: 170px;" src="https://vnn-imgs-f.vgcloud.vn/2020/07/17/08/real-madrid-la-liga.jpg" alt="fashion banner img"></a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- popular section -->
  <section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
             <ul class="nav nav-tabs aa-products-tab">
              @for ($i = 0; $i < count($section_popular); $i++)
                  @if ($i==0)
                    <li class="active"><a href="#{{ $section_popular[$i]->tag }}" data-toggle="tab">{{ $section_popular[$i]->name }}</a></li>  
                  @else
                    <li><a href="#{{ $section_popular[$i]->tag }}" data-toggle="tab">{{ $section_popular[$i]->name }}</a></li>
                  @endif
              @endfor 
                {{--  <li class="active"><a href="#popular" data-toggle="tab">Popular</a></li>
                <li><a href="#featured" data-toggle="tab">Featured</a></li>
                <li><a href="#latest" data-toggle="tab">Latest</a></li>                      --}}
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                @for ($i = 0; $i < count($section_popular); $i++)
                  @if ($i==0)
                    <!-- Start active popular category -->
                    <div class="tab-pane fade in active" id="{{ $section_popular[$i]->tag }}">
                      <ul class="aa-product-catg aa-popular-slider">
                        <!-- start single product item -->
                           @php
                                $count = 0;
                           @endphp
                           @foreach ($section_popular[$i]->section_content as $item)
                            @foreach ($item->product as $product)
                            @php
                                $count++;
                            @endphp
                            <li>
                              <figure>
                                <a class="aa-product-img" href="#"><img style="height: 300px;width: 250px;" src="{{ $product->link_image }}" alt="polo shirt img"></a>
                                 <figcaption>
                                  <h4 class="aa-product-title"><a href="{{ route('frontend.detailproduct', ['id'=>$product->id]) }}">{{ $product->product_name }}</a></h4>
                                  @if ($product->sale_percent > 0)
                                    <span class="aa-product-price">{{ number_format($product->price/100 * (100-$product->sale_percent)) }} đ</span><span class="aa-product-price"><del>{{ number_format($product->price) }} đ</del></span>
                                  @else
                                    <span class="aa-product-price">{{ number_format($product->price) }} đ</span> 
                                  @endif
                                </figcaption>
                              </figure>                     
                              <div class="aa-product-hvr-content">
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                              </div>
                              <!-- product badge -->
                              @if($product->quantity - $product->sold <= 0)
                                <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                              @elseif ($product->sale_percent > 0)
                                <span class="aa-badge aa-sale" href="#">SALE!</span> 
                              @endif
                            </li> 
                            @endforeach
                            @if ($count==8)
                                @break
                            @endif
                           @endforeach
                      </ul>
                      <a class="aa-browse-btn" href="{{ route('frontend.listproduct') }}">Xem toàn bộ sản phẩm <span class="fa fa-long-arrow-right"></span></a>
                    </div>
                    <!-- / active product category -->
                  @else
                    <!-- start product popular -->
                    <div class="tab-pane fade" id="{{ $section_popular[$i]->tag }}">
                    <ul class="aa-product-catg aa-featured-slider">
                        <!-- start single product item -->
                        @php
                                $count = 0;
                           @endphp
                           @foreach ($section_popular[$i]->section_content as $item)
                            @foreach ($item->product as $product)
                            @php
                                $count++;
                            @endphp
                            <li>
                              <figure>
                                <a class="aa-product-img" href="#"><img style="height: 300px;width: 250px;" src="{{ $product->link_image }}" alt="polo shirt img"></a>
                                 <figcaption>
                                  <h4 class="aa-product-title"><a href="{{ route('frontend.detailproduct', ['id'=>$product->id]) }}">{{ $product->product_name }}</a></h4>
                                  @if ($product->sale_percent > 0)
                                    <span class="aa-product-price">{{ number_format($product->price/100 * (100-$product->sale_percent)) }} đ</span><span class="aa-product-price"><del>{{ number_format($product->price) }} đ</del></span>
                                  @else
                                    <span class="aa-product-price">{{ number_format($product->price) }} đ</span> 
                                  @endif
                                </figcaption>
                              </figure>                     
                              <div class="aa-product-hvr-content">
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                              </div>
                              <!-- product badge -->
                              @if($product->quantity - $product->sold <= 0)
                                <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                              @elseif ($product->sale_percent > 0)
                                <span class="aa-badge aa-sale" href="#">SALE!</span> 
                              @endif
                            </li> 
                            @endforeach
                            @if ($count==8)
                                @break
                            @endif
                           @endforeach                                                                   
                      </ul>
                      <a class="aa-browse-btn" href="{{ route('frontend.listproduct') }}">Xem toàn bộ sản phẩm <span class="fa fa-long-arrow-right"></span></a>
                    </div>
                    <!-- / product popular -->
                  @endif
              @endfor 
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>
  <!-- / popular section -->
  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>MIỄN PHÍ SHIP</h4>
                <P>Miễn phí giao hàng trên toàn quốc với đơn hàng trên 300.000vnđ</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>30 NGÀY HOÀN LẠI TIỀN</h4>
                <P>Chúng tôi cam kết trong vòng 30 ngày kể từ khi thanh toán</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>HỖ TRỢ 24/7</h4>
                <P>Tổng đài Chăm sóc khách hàng 24/7</P>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Support section -->
  <!-- Testimonial -->
  {{--  <section id="aa-testimonial">  
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-testimonial-area">
            <ul class="aa-testimonial-slider">
              <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="sources/img/love.jpg" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>Allison</p>
                    <span>Designer</span>
                    <a href="#">Dribble.com</a>
                  </div>
                </div>
              </li>
              <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="img/testimonial-img-1.jpg" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>KEVIN MEYER</p>
                    <span>CEO</span>
                    <a href="#">Alphabet</a>
                  </div>
                </div>
              </li>
               <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="img/testimonial-img-3.jpg" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>Luner</p>
                    <span>COO</span>
                    <a href="#">Kinatic Solution</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Testimonial -->  --}}

  <!-- Latest Blog -->
  <section id="aa-latest-blog">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-latest-blog-area">
            <h2>Tin mới nhất</h2>
            <div class="row">
              <!-- single latest blog -->
              @php
                  $count = 0;
              @endphp
              @foreach ($news as $item)
                @php
                    $count++;
                @endphp
                <div class="col-md-4 col-sm-4">
                  <div class="aa-latest-blog-single">
                    <figure class="aa-blog-img">                    
                      <img src="{{ $item->link_image }}" alt="img">
                        <figcaption class="aa-blog-img-caption">
                        <span href="#"><i class="fa fa-eye"></i>5K</span>
                        <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                        <a href="#"><i class="fa fa-comment-o"></i>{{ count($item->comments) }}</a>
                        <span href="#"><i class="fa fa-clock-o"></i>{{ $item->created_at->format('M d Y') }}</span>
                      </figcaption>                          
                    </figure>
                    <div class="aa-blog-info">
                      <h3 class="aa-blog-title"><a href="{{ route('frontend.detailnews', ['id'=>$item->id]) }}">{{ $item->title }}</a></h3>
                      <div class="news">{!! html_entity_decode($item->content) !!}</div> 
                      <a href="{{ route('frontend.detailnews', ['id'=>$item->id]) }}" class="aa-read-mor-btn">Đọc thêm <span class="fa fa-long-arrow-right"></span></a>
                    </div>
                  </div>
                </div>
                @if ($count==3)
                    @break
                @endif
              @endforeach
              <!-- single latest blog -->
            </div>
          </div>
        </div>    
      </div>
    </div>
  </section>
  <!-- / Latest Blog -->

  <!-- Client Brand -->
  <section id="aa-client-brand">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-client-brand-area">
            <ul class="aa-client-brand-slider">
              <li><a href="#"><img src="sources/img/client-brand-java.png" alt="java img"></a></li>
              <li><a href="#"><img src="sources/img/client-brand-jquery.png" alt="jquery img"></a></li>
              <li><a href="#"><img src="sources/img/client-brand-html5.png" alt="html5 img"></a></li>
              <li><a href="#"><img src="sources/img/client-brand-css3.png" alt="css3 img"></a></li>
              <li><a href="#"><img src="sources/img/client-brand-wordpress.png" alt="wordPress img"></a></li>
              <li><a href="#"><img src="sources/img/client-brand-joomla.png" alt="joomla img"></a></li>
              <li><a href="#"><img src="sources/img/client-brand-java.png" alt="java img"></a></li>
              <li><a href="#"><img src="sources/img/client-brand-jquery.png" alt="jquery img"></a></li>
              <li><a href="#"><img src="sources/img/client-brand-html5.png" alt="html5 img"></a></li>
              <li><a href="#"><img src="sources/img/client-brand-css3.png" alt="css3 img"></a></li>
              <li><a href="#"><img src="sources/img/client-brand-wordpress.png" alt="wordPress img"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Client Brand -->

  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Đăng kí nhận tin khuyến mãi qua email </h3>
            {{--  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>  --}}
            <form action="{{ route('frontend.subriceemail') }}" class="aa-subscribe-form">
              @csrf
              <input type="email" name="email" id="" placeholder="Nhập mail">
              <input type="submit" value="Đăng kí">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->
  
  <!-- Login Modal -->  
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Đăng nhập</h4>
          <form method="POST" class="aa-login-form" action="{{ route('frontend.login') }}">
            @csrf
            <label for="">Tài khoản<span>*</span></label>
            <input name="username" type="text" placeholder="Username or email">
            <label for="">Mật khẩu<span>*</span></label>
            <input name="password" type="password" placeholder="Tài khoản">
            <button class="aa-browse-btn" type="submit">Đăng nhập</button>
            <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Ghi nhớ đăng nhập </label>
            <p class="aa-lost-password"><a href="#">Quên mật khẩu?</a></p>
            <div class="aa-register-now">
              Bạn chưa có tài khoản?<a href="account.html">Đăng kí ở đây!</a>
            </div>
          </form>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>  
@endsection