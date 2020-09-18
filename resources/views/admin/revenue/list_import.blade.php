@extends('admin.layout.master')
<style>
    a.button{
        margin: 0px 2px;
        display: block;
        text-align: center;
        background-color: #3598dc;
        border: 1px solid black;
        height: auto;
        width: auto;
        padding: 3px 10px;
        color: white;
    }
    a.button2{
        margin: 0px 2px;
        display: block;
        text-align: center;
        background-color: #5cb85c;
        border: 1px solid black;
        height: auto;
        width: auto;
        padding: 3px 10px;
        color: white;
    }
</style>
@section('content')
<div class="page-title">
    <h3>Danh sách sản phẩm</h3>
</div>
<a style="width: 200px;margin-bottom: 20px;margin-left: 850px" class="button2" href="{{ route('admin.import_goods') }}"><i class="fa fa-plus" aria-hidden="true"></i> Nhập hàng</a>
<div>
    <table>
        <thead>
          <th style="width: 250px">Tên sản phẩm</th>
          <th style="width: 80px">Giá</th>
          <th style="width: 10px">Size</th>
          <th style="width: 80px">Số lượng</th>
          <th style="width: 130px">Tổng tiền</th>
          <th>Người nhập</th>
          <th style="width: 80">Ngày nhập</th>
        </thead>
        <tbody>
           @if (!is_null($data))
            @foreach ($data as $item)
                <tr>
                    <td style="color: green">{{ $item->product->product_name }}</td>
                    <td>{{ number_format($item->price) }} đ</td>
                    <td>{{ $item->size }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price * $item->quantity) }} đ</td>
                    <td>{{ $item->user->username }}</td>
                    <td>{{ $item->created_at }}</td>
                </tr>
            @endforeach
          @endif
        </tbody>
      </table>
</div>
@endsection