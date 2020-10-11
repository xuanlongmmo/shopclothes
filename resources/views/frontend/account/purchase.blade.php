@extends('frontend.account.master_user')
<style>
    th,td{
        border-bottom: 0.5px solid grey;
        margin: 10px 0px;
        height: 50px;
    }
</style>
@section('content_user')
    <table style="margin-left: 45px">
        <thead>
            <tr>
                <th style="width: 150px;">Mã đơn hàng</th>
                <th style="width: 100px;">Tổng tiền</th>
                <th style="width: 150px;">Ngày mua</th>
                <th style="width: 150px;">Trạng thái</th>
                <th style="width: 150px;"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($myorder as $item)
                <tr>
                    <td style="width: 150px;">{{ $item->id }}</td>
                    <td style="width: 150px;">{{ number_format($item->total_pay) }} đ</td>
                    <td style="width: 150px;">{{ $item->created_at->format('d/m/Y') }}</td>
                    <td style="width: 150px;">
                        @if ($item->id_status == 3)
                            <span style="color: green">{{ $item->status->name_status }}</span>
                        @elseif ($item->id_status == 4)
                            <span style="color: red">{{ $item->status->name_status }}</span>
                        @else    
                            <span>{{ $item->status->name_status }}</span>
                        @endif
                    </td>
                    <td style="width: 150px;"><a href="{{ route('frontend.detailpurchase', ['id'=>$item->id]) }}">Xem chi tiết</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection