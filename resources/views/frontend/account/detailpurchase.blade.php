@extends('frontend.account.master_user')
<style>
    th{
        border-bottom: 0.5px solid grey;
        margin: 10px 0px;
        height: 50px;
    }
    td{
        border-bottom: 0.5px solid grey;
        margin: 10px 0px;
        height: 100px;
    }
    .hang{
        width: 820px;
        height: auto;
        margin: 20px 0px;
        display: flex;
    }
    .cot{
        margin-right: 3%;
        width: 30%;
        border: 1px solid black;
    }
    .up{
        margin-left: 10px;
        text-transform: uppercase;
    }
    .ogrey{
        height: 120px;
        padding: 5px 5px;
        border-top: 1px solid black;
    }
    .ogrey span{
        margin-left: 10px;
    }
</style>
@section('content_user')
    <div style="margin-left: 20px">
        <span style="font-size: 20px">Chi tiết đơn hàng #{{ $data->id }} - 
            @if ($data->id_status == 4)
                <span style="color: red">{{ $data->status->name_status }}</span>
            @else
                {{ $data->status->name_status }}
            @endif        
        </span><br>
        <span style="font-size: 12px">Ngày đặt hàng: {{ $data->created_at->format('H:m d/m/Y') }}</span>
        <div class="hang">
            <div class="cot">
                <span class="up">Địa chỉ người nhận</span>
                <div class="ogrey">
                    <span style="text-transform: uppercase;font-size: 18px;color: cornflowerblue">{{ $data->fullname }}</span>
                    <br>
                    <span style="font-size: 14px;color: cornflowerblue">Địa chỉ :</span>
                    <span style="font-size: 14px">{{ $data->address_ship }}</span>
                    <br>
                    <span style="font-size: 14px;color: cornflowerblue">Điện thoại :</span>
                    <span>{{ $data->phone }}</span>
                </div>
            </div>  
            <div class="cot">
                <span class="up">HÌNH THỨC GIAO HÀNG</span>
                <div class="ogrey">
                    <span style="font-size: 14px">{{ $data->method_ship->name }}</span>
                    <br>
                    <span style="font-size: 14px">Giao vào Thứ hai, 14/09</span>
                    <br>
                    <span style="font-size: 14px">Phí vận chuyển: 35.000đ</span>
                </div>
            </div>  
            <div class="cot">
                <span class="up">HÌNH THỨC THANH TOÁN</span>
                <div class="ogrey">
                    @if ($data->id_method_payment == 1)
                        <span style="font-size: 14px">{{ $data->method_payment->name }}</span>
                    @else
                        <span style="font-size: 14px">{{ $data->method_payment->name }}</span>
                        <br>
                        <span style="font-size: 14px">Mã giao dịch: 132545</span>
                    @endif
                </div>   
            </div>  
        </div>  
        <table>
            <thead>
                <th style="width: 330px;">Sản phẩm</th>
                <th style="width: 130px;">Giá</th>
                <th style="width: 100px;">Số lượng</th>
                <th style="width: 130px;">Giảm giá</th>
                <th style="width: 130px;text-align: right;">Tạm tính</th>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach($dataproduct as $item)
                    @foreach($data->listproduct as $ite)
                        @if($item->id == $ite->id_product)
                            @php
                                $quantity = $ite->quantity;
                                $sale = $ite->sale;
                            @endphp
                        @endif
                    @endforeach
                    <tr>
                        <td>
                            <img style="width: 85px;height: 80px;" src="{{ $item->link_image }}" alt="">
                            <a href="{{ route('frontend.detailproduct', ['id'=>$item->id]) }}">{{ $item->product_name }}</a>
                        </td>
                        <td>{{ number_format($item->price) }} đ</td>
                        <td>{{ $quantity }}</td>
                        <td>{{ number_format(($item->price * $quantity * $sale)/100) }} đ</td>
                        <td style="text-align: right;">{{ number_format(($item->price * $quantity) - ($item->price * $quantity * $sale)/100) }} đ</td>
                        @php
                            $total = $total + (($item->price * $quantity) - ($item->price * $quantity * $sale)/100);
                        @endphp
                    </tr>
                @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align: right;">
                            <span>Tạm tính</span><br>
                            <span>Giảm giá code</span><br>
                            <span>Phí vận chuyển</span><br>
                            <span style="color: red">Tổng cộng</span>
                        </td>
                        <td style="text-align: right;">
                            <span>{{ number_format($total) }} đ</span><br>
                            <span>
                                @if (is_null($data->money_sale))
                                    0 đ
                                @else
                                    {{ $data->money_sale }} đ
                                @endif    
                            </span><br>
                            <span>35.000 đ</span><br>
                            <span>{{ number_format($data->total_pay) }} đ</span>
                        </td>
                    </tr>
            </tbody>
        </table>
        @if ($data->id_status == 1)
            <a href="{{ route('frontend.cancelorder', ['id'=>$data->id]) }}"><button style="margin: 20px 0px 0px 710px;background-color: red;border: red solid 1px"><span style="color: black">Hủy đơn</span></button></a>
        @endif
    </div>
@endsection