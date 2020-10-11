@extends('frontend.layout.master')
@section('content')
@php
  $total = 0;
@endphp
@foreach ($data as $item)
    @foreach (session('product') as $key=>$value)   
        @if ($key == $item->id)
            @php
                $quantity = $value;
            @endphp
        @endif
    @endforeach
    @php
        $total = $total + (($item->price * $quantity) - ($item->price * $quantity * $item->sale_percent)/100);
    @endphp
@endforeach
<!-- Cart view section -->
<section id="checkout">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
       <div class="checkout-area">
           <div class="row">
             <div class="col-md-8">
               <div class="checkout-left">
                 <div class="panel-group" id="accordion">
                   <!-- Coupon section -->
                   <div class="panel panel-default aa-checkout-coupon">
                     <div class="panel-heading">
                       <h4 class="panel-title">
                         <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                           Bạn có mã giảm giá?
                         </a>
                       </h4>
                     </div>
                     <div id="collapseOne" class="panel-collapse collapse in">
                       <form method="POST" action="{{ route('frontend.postcode') }}">
                         @csrf
                        <div class="panel-body">
                          <input name="code" type="text" placeholder="Nhập mã giảm giá" class="aa-coupon-code">
                          <input value="{{ $total }}" style="display: none" type="text" name="total" id="">
                          @if (session('errors'))
                            <span style="color: red">{{ session('errors') }}</span><br>
                          @endif
                          <input type="submit" value="ÁP DỤNG" class="aa-browse-btn">
                        </div>
                       </form>
                     </div>
                   </div>
                <form method="POST" action="{{ route('frontend.postpayment') }}">
                  @csrf
                   <!-- Billing Details -->
                   <div class="panel panel-default aa-checkout-billaddress">
                     <div class="panel-heading">
                       <h4 class="panel-title">
                         <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                           Địa chỉ nhận hóa đơn
                         </a>
                       </h4>
                     </div>
                     <div id="collapseThree" class="panel-collapse collapse">
                       <div class="panel-body">
                         <div class="row">
                           <div class="col-md-12">
                             <div class="aa-checkout-single-bill">
                               <input name="fullnamebill" type="text" placeholder="Họ tên*" >
                             </div>                             
                           </div>                            
                         </div>  
                         <div class="row">
                           <div class="col-md-6">
                             <div class="aa-checkout-single-bill">
                               <input name="emailbill" type="email" placeholder="Email*" >
                             </div>                             
                           </div>
                           <div class="col-md-6">
                             <div class="aa-checkout-single-bill">
                               <input name="phonebill" type="tel" placeholder="Số điện thoại*" >
                             </div>
                           </div>
                         </div> 
                         <div class="row">
                           <div class="col-md-12">
                             <div class="aa-checkout-single-bill">
                               <select style="color: black">
                                 <option value="0">Tỉnh/Thành phố</option>
                                  @foreach ($provinces as $item)
                                    <option value="{{ $item->gso_id }}">{{ $item->name }}</option>
                                  @endforeach
                               </select>
                             </div>                             
                           </div>                            
                         </div>
                         <div class="row">
                           <div class="col-md-6">
                             <div class="aa-checkout-single-bill">
                              <select style="color: black">
                                <option value="0">Quận/Huyện</option>
                                @foreach ($districts as $item)
                                    <option value="{{ $item->gso_id }}">{{ $item->name }}</option>
                                @endforeach
                              </select>
                             </div>                             
                           </div>
                           <div class="col-md-6">
                             <div class="aa-checkout-single-bill">
                              <select style="color: black">
                                <option value="0">Phường/Xã</option>
                                @foreach ($wards as $item)
                                    <option value="{{ $item->gso_id }}">{{ $item->name }}</option>
                                @endforeach
                              </select>
                             </div>
                           </div>
                         </div>   
                         <div class="row">
                          <div class="col-md-12">
                            <div class="aa-checkout-single-bill">
                              <textarea name="address_bill" style="color: black" placeholder="Địa chỉ*" cols="8" rows="3"></textarea>
                            </div>                             
                          </div>                            
                        </div>                                 
                       </div>
                     </div>
                   </div>
                   <!-- Shipping Address -->
                   <div class="panel panel-default aa-checkout-billaddress">
                     <div class="panel-heading">
                       <h4 class="panel-title">
                         <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                           Địa chỉ nhận hàng
                         </a>
                       </h4>
                     </div>
                     <div id="collapseFour" class="panel-collapse collapse">
                       <div class="panel-body">
                         <div class="row">
                           <div class="col-md-12">
                             <div class="aa-checkout-single-bill">
                               <input name="fullname" type="text" placeholder="Họ tên*" >
                             </div>                             
                           </div>                            
                         </div>  
                         <div class="row">
                           <div class="col-md-6">
                             <div class="aa-checkout-single-bill">
                               <input name="email" type="email" placeholder="Email*" >
                             </div>                             
                           </div>
                           <div class="col-md-6">
                             <div class="aa-checkout-single-bill">
                               <input name="phone" type="tel" placeholder="Số điện thoại*" >
                             </div>
                           </div>
                         </div> 
                         <div class="row">
                           <div class="col-md-12">
                             <div class="aa-checkout-single-bill">
                               <textarea style="color: black" name="address_ship" placeholder="Địa chỉ*" cols="8" rows="3"></textarea>
                             </div>                             
                           </div>                            
                         </div>   
                         <div class="row">
                          <div class="col-md-12">
                            <div class="aa-checkout-single-bill">
                              <select style="color: black">
                                <option value="0">Tỉnh/Thành phố</option>
                                @foreach ($provinces as $item)
                                    <option value="{{ $item->gso_id }}">{{ $item->name }}</option>
                                @endforeach
                              </select>
                            </div>                             
                          </div>                            
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="aa-checkout-single-bill">
                             <select style="color: black">
                               <option value="0">Quận/Huyện</option>
                               @foreach ($wards as $item)
                                    <option value="{{ $item->gso_id }}">{{ $item->name }}</option>
                                @endforeach
                             </select>
                            </div>                             
                          </div>
                          <div class="col-md-6">
                            <div class="aa-checkout-single-bill">
                             <select style="color: black">
                               <option value="0">Phường/Xã</option>
                               @foreach ($districts as $item)
                                    <option value="{{ $item->gso_id }}">{{ $item->name }}</option>
                                @endforeach
                             </select>
                            </div>
                          </div>
                        </div> 
                          <div class="row">
                           <div class="col-md-12">
                             <div class="aa-checkout-single-bill">
                               <textarea name="note" placeholder="Ghi chú" cols="8" rows="3"></textarea>
                             </div>                             
                           </div>                            
                         </div>              
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
             <div class="col-md-4">
               <div class="checkout-right">
                 <h4>Chi tiết đơn hàng</h4>
                 <div class="aa-order-summary-area">
                   <table class="table table-responsive">
                     <thead>
                       <tr>
                         <th>Sản phẩm</th>
                         <th>Giá</th>
                       </tr>
                     </thead>
                     <tbody>
                       @foreach ($data as $item)
                        @foreach (session('product') as $key=>$value)
                            @if ($key == $item->id)
                                @php
                                    $quantity = $value;
                                @endphp
                            @endif
                        @endforeach
                        <tr>
                          <td><a href="{{ route('frontend.detailproduct', ['id'=>$item->id]) }}">{{ $item->product_name }}</a> <strong> x  {{ $quantity }}</strong></td>
                          <td>{{ number_format($item->price * $quantity) }} vnđ</td>
                        </tr>
                       @endforeach
                     </tbody>
                     <tfoot>
                       <tr>
                         <th>Phụ phí</th>
                         <td>0</td>
                       </tr>
                       <tr>
                        <th>Giảm giá</th>
                        @if (session('salecode'))
                          <td>{{ number_format(session('salecode')) }}vnđ</td>
                        @else
                          <td>0</td>                           
                        @endif
                       </tr>
                        <tr>
                         <th>Tổng</th>
                         @if (session('salecode'))
                          <td>{{ number_format($total  - session('salecode')) }}vnđ</td>
                          <input style="display: none" type="text" name="sale" value="{{ session('salecode') }}">
                          <input style="display: none" type="text" name="totalpay" value="{{ $total - session('salecode') }}">
                         @else
                          <input style="display: none" type="text" name="sale" value="0">
                          <input style="display: none" type="text" name="totalpay" value="{{ $total }}">
                          <td>{{ number_format($total) }}vnđ</td>                           
                         @endif
                       </tr>
                     </tfoot>
                   </table>
                 </div>
                 <h4>Phương thức giao hàng</h4>
                 <div class="aa-payment-method">   
                  @foreach ($method_ship as $item)
                      @if (is_null($item->image))
                        <input type="radio" id="cashdelivery" value="{{ $item->id }}" name="optionsship"> {{ $item->name }} </label><br>
                      @else
                        <input type="radio" value="{{ $item->id }}" id="cashdelivery" name="optionsship"> <img style="width: 40px;margin: 4px 0px" src=" {{ $item->image }}" alt="">  {{ $item->name }} </label>
                      @endif
                  @endforeach                 
                 </div>
                 <br>
                 <h4>Phương thức thanh toán</h4>
                 <div class="aa-payment-method">                    
                  @foreach ($method_payment as $item)
                      @if (is_null($item->image))
                        <label for="cashdelivery"><input type="radio" value="{{ $item->id }}" id="cashdelivery" name="optionspayment"> {{ $item->name }} </label>
                      @else
                        <label for="paypal"><input type="radio" value="{{ $item->id }}" id="paypal" name="optionspayment"> <img style="width: 40px;margin: 4px 0px" src=" {{ $item->image }}" alt="">  {{ $item->name }} </label>
                      @endif
                  @endforeach
                   {{--  <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark">      --}}
                   <input type="submit" value="THANH TOÁN" class="aa-browse-btn">                
                 </div>
               </div>
             </div>
           </div>
         </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / Cart view section -->
@endsection

{{--  <div class="panel panel-default aa-checkout-login">
  <div class="panel-heading">
    <h4 class="panel-title">
      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
        Client Login 
      </a>
    </h4>
  </div>
  <div id="collapseTwo" class="panel-collapse collapse">
    <div class="panel-body">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat voluptatibus modi pariatur qui reprehenderit asperiores fugiat deleniti praesentium enim incidunt.</p>
      <input type="text" placeholder="Username or email">
      <input type="password" placeholder="Password">
      <button type="submit" class="aa-browse-btn">Login</button>
      <label for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
      <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
    </div>
  </div>
</div>  --}}