@extends('frontend.layout.master')
@section('content') 
<!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table aa-wishlist-table">
              @if(!empty($data))
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Ảnh sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Trạng thái</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                          @foreach ($data as $item)
                            <tr>
                              <td><a class="remove" href="{{ route('frontend.deletewishlist', ['id'=>$item->id]) }}"><fa class="fa fa-close"></fa></a></td>
                              <td><a href="{{ route('frontend.detailproduct', ['id'=>$item->id]) }}"><img src="{{ $item->link_image }}" alt="img"></a></td>
                              <td><a class="aa-cart-title" href="{{ route('frontend.detailproduct', ['id'=>$item->id]) }}">{{ $item->product_name }}</a></td>
                              @if ($item->sale_percent>0)
                                <td>{{ number_format(($item->price * (100 - $item->sale_percent))/100) }} vnđ</td>
                              @else
                                <td>{{ number_format($item->price) }} vnđ</td> 
                              @endif
                              @php
                                  $total = 0;
                              @endphp
                              @foreach ($item->detail_product as $i)
                                  @php
                                    $total = ($i->quantity - $i->sold) + $total;
                                  @endphp
                              @endforeach
                              @if ($total==0)
                                <td><span style="color: red">Hết hàng</span></td>
                              @else
                                <td>Còn hàng</td>
                              @endif
                              <td><a href="#" class="aa-add-to-cart-btn">Thêm vào giỏ hàng</a></td>
                            </tr>  
                          @endforeach
                      </tbody>
                  </table>
                </div>
              @else
                <div style="width: 800px;background: green" class="alert">
                  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>Bạn chưa có sản phẩm yêu thích nào
                </div>
              @endif               
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
@endsection