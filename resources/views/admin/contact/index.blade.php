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
    <h3>Quản lí liên hệ</h3>
</div>
<div>
    <table>
        <thead>
          <th style="width: 150px">Họ tên</th>
          <th>Email</th>
          <th>Số điện thoại</th>
          <th>Tiêu đề</th>
          <th style="width: 100px">Trạng thái</th>
          <th style="width: 60px"></th>
        </thead>
        <tbody>
          @if (!is_null($list_contact))
            @foreach ($list_contact as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->title }}</td>
                    <td>
                        @if ($item->status==0)
                            <span style="color: red">Chưa trả lời</span>
                        @else
                            <span style="color: green">Đã trả lời</span>
                        @endif
                    </td>
                    <td style="display: flex">
                        @if ($item->status==0)
                            <a class="button" href="{{ route('admin.getrefcontact', ['id'=>$item->id]) }}">Trả lời</a>
                        @endif
                    </td>
                </tr>
            @endforeach
          @endif
        </tbody>
      </table>
</div>
@endsection