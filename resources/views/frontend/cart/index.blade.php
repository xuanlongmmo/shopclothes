@extends('frontend.layout.master')
@section('content')
@if (session()->has('count')>0)
<!-- Cart view section -->
<section id="cart-view">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="cart-view-area">
          <div class="cart-view-table">
            <form action="">
              <div class="table-responsive">
                 <table class="table">
                   <thead>
                     <tr>
                       <th></th>
                       <th>Ảnh sản phẩm</th>
                       <th>Sản phẩm</th>
                       <th>Giá</th>
                       <th>Số lượng</th>
                       <th>Tổng tiền</th>
                     </tr>
                   </thead>
                   <tbody>
                      @if(!is_null($cart))
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($cart as $item)
                          <tr>
                            <td><a class="remove" href="#"><fa class="fa fa-close"></fa></a></td>
                            <td><a href="{{ route('frontend.detailproduct', ['id'=>$item->id]) }}"><img src="{{ $item->link_image }}" alt="img"></a></td>
                            <td><a class="aa-cart-title" href="{{ route('frontend.detailproduct', ['id'=>$item->id]) }}">{{ $item->product_name }}</a></td>
                            <td>{{number_format($item->price) }} vnđ</td>
                            <td><input class="aa-cart-quantity" type="number" value="{{ $item->quantity }}"></td>
                            <td>{{ number_format($item->quantity * $item->price) }}</td>
                            @php
                                $total = $total + ($item->quantity * $item->price);
                            @endphp
                          </tr>
                        @endforeach
                      @endif
                     </tbody>
                 </table>
               </div>
            </form>
            <!-- Cart Total view -->
            <div class="cart-view-total">
              {{--  <h4>Tổng tiền</h4>  --}}
              <table class="aa-totals-table">
                <tbody>
                  <tr>
                    <th>Tổng tiền phải thanh toán</th>
                    <td>{{ number_format($total) }}</td>
                  </tr>
                  {{--  <tr>
                    <th>Số tiền sau khi giảm</th>
                    <td>$450</td>
                  </tr>  --}}
                </tbody>
              </table>
              <a href="#" class="aa-cart-view-btn">Thanh toán</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@else
  <div style="margin: 0px 300px;padding-top: 200px;margin-bottom: 40px">
    <span style="color: green">Bạn chưa có sản phẩm nào trong giỏ hàng</span>
  </div>
@endif
</section>
<!-- / Cart view section -->
@endsection