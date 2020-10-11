@extends('frontend.layout.master')
@section('content')
@if (intval(session('count'))>0)
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
                       <th>Giảm giá</th>
                       <th style="width: 100px;">Số lượng</th>
                       <th>Tổng tiền</th>
                     </tr>
                   </thead>
                   <tbody>
                      @php
                          $total = 0;
                      @endphp
                      @if (Auth::check())
                          @foreach ($data as $item)
                            <tr>
                              <td><a class="remove" href="{{ route('frontend.deletecart', ['id'=>$item->product->id]) }}"><fa class="fa fa-close"></fa></a></td>
                              <td><a href="{{ route('frontend.detailproduct', ['id'=>$item->id]) }}"><img src="{{ $item->product->link_image }}" alt="img"></a></td>
                              <td><a class="aa-cart-title" href="{{ route('frontend.detailproduct', ['id'=>$item->product->id]) }}">{{ $item->product->product_name }}</a></td>
                              <td>{{number_format($item->product->price) }} vnđ</td>
                              <td>{{ $item->product->sale_percent }}%</td>
                              <td>
                                <div style="display: flex">
                                  <a style="display: block;background-color: transparent;width: 28px;height: 40px;;border: 1px solid grey;padding: 6px 0px" href="{{ route('frontend.reducequantity', ['id'=>$item->product->id]) }}">-</a>
                                  <input style="width: 28px;margin: 0px 10px" readonly class="aa-cart-quantity" type="text" value="{{ $item->quantity }}">
                                  <a style="display: block;background-color: transparent;width: 28px;height: 40px;;border: 1px solid grey;padding: 6px 0px" href="{{ route('frontend.updatequantity', ['id'=>$item->product->id]) }}">+</a>
                                </div>
                              </td>
                              <td>{{ number_format(($item->quantity * $item->product->price) - ($item->quantity * $item->product->price * $item->product->sale_percent)/100 ) }} vnđ</td>
                              @php
                                  $total = $total + (($item->quantity * $item->product->price) - ($item->quantity * $item->product->price * $item->product->sale_percent)/100 );
                              @endphp
                            </tr>
                          @endforeach
                      @else
                        @foreach ($data as $item)
                          <tr>
                            @foreach (session('product') as $key=>$value)
                              @if ($key == $item->id)
                                @php
                                  $quantity = $value
                                @endphp
                              @endif
                            @endforeach
                            <td><a class="remove" href="{{ route('frontend.deletecart', ['id'=>$item->id]) }}"><fa class="fa fa-close"></fa></a></td>
                            <td><a href="{{ route('frontend.detailproduct', ['id'=>$item->id]) }}"><img src="{{ $item->link_image }}" alt="img"></a></td>
                            <td><a class="aa-cart-title" href="{{ route('frontend.detailproduct', ['id'=>$item->id]) }}">{{ $item->product_name }}</a></td>
                            <td>{{number_format($item->price) }} vnđ</td>
                            <td>{{ $item->sale_percent }}%</td>
                            <td>
                              <div style="display: flex">
                                <a style="display: block;background-color: transparent;width: 28px;height: 40px;;border: 1px solid grey;padding: 6px 0px" href="{{ route('frontend.reducequantity', ['id'=>$item->id]) }}">-</a>
                                <input style="width: 28px;margin: 0px 10px" readonly class="aa-cart-quantity" type="text" value="{{ $quantity }}">
                                <a style="display: block;background-color: transparent;width: 28px;height: 40px;;border: 1px solid grey;padding: 6px 0px" href="{{ route('frontend.updatequantity', ['id'=>$item->id]) }}">+</a>
                              </div>
                            </td>
                            <td>{{ number_format(($quantity * $item->price) - ($quantity * $item->price * $item->sale_percent)/100) }} vnđ</td>
                            @php
                                $total = $total + (($quantity * $item->price) - ($quantity * $item->price * $item->sale_percent)/100);
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
                    <td>{{ number_format($total) }} vnđ</td>
                  </tr>
                  {{--  <tr>
                    <th>Số tiền sau khi giảm</th>
                    <td>$450</td>
                  </tr>  --}}
                </tbody>
              </table>
              <a href="{{ route('frontend.checkout') }}" class="aa-cart-view-btn">Thanh toán</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@else
  <div style="margin: 0px 300px;padding-top: 250px;margin-bottom: 90px">
    <span style="color: green">Bạn chưa có sản phẩm nào trong giỏ hàng</span>
  </div>
@endif
</section>
<!-- / Cart view section -->
@endsection