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
    <h3>Danh sách đơn hàng</h3>
</div>
<div>
    <table>
        <thead>
          <th>Mã đơn</th>
          <th style="width: 200px">Họ tên</th>
          <th>Số điện thoại</th>
          <th>Tổng tiền</th>
          <th>Trạng thái</th>
          <th>Ngày đặt</th>
          <th style="width: 70px"></th>
        </thead>
        <tbody>
          @if (!is_null($data_order))
            @foreach ($data_order as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td style="">{{ $item->fullname }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ number_format($item->total_pay) }} đ</td>
                    <td>
                        @if ($item->id_status == 2)
                            <span style="color: blue">{{ $item->status->name_status }}</span>
                        @elseif($item->id_status == 3)
                            <span style="color: green">{{ $item->status->name_status }}</span>
                        @elseif($item->id_status == 4)
                            <span style="color: red">{{ $item->status->name_status }}</span>
                        @else
                            <span style="color: black">{{ $item->status->name_status }}</span>
                        @endif
                    </td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    <td style="width: 70px"><a href="{{ route('admin.detailorder', ['id'=>$item->id]) }}">Xem chi tiết</a></td>
                </tr>
            @endforeach
          @endif
        </tbody>
      </table>
</div>
@endsection