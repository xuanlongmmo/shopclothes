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
        margin: 11px 2px;
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
    <h3>Quản lí người dùng</h3>
</div>
<a style="width: 200px;margin-bottom: 20px;margin-left: 850px" class="button2" href="{{ route('admin.addsubadmin') }}"><i class="fa fa-plus" aria-hidden="true"></i> Thêm subadmin mới</a>
<div>
    <table>
        <thead>
          <th style="width: 150px">Tên người dùng</th>
          <th style="width: 180px">Họ tên</th>
          <th style="width: 80px">Ảnh</th>
          <th>Email</th>
          <th>Số điện thoại</th>
          <th style="width: 90px">Ngày tạo</th>
          <th style="width: 80px"></th>
        </thead>
        <tbody>
          @if (!is_null($listuser))
            @foreach ($listuser as $item)
                <tr>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->fullname }}</td>  
                    <td>
                        <div class="preview"> 
                            <img width="60px" height="60px" src="{{ $item->image_profile }}" /> 
                        </div>
                    </td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    <td style="width: 80px;display: flex">
                        <a class="button" href="{{ route('admin.editsubadmin', ['id'=>$item->id]) }}">Sửa</a>
                        <a class="button" href="{{ route('admin.deleteuser', ['id'=>$item->id]) }}">Xóa</a>
                    </td>
                </tr>
            @endforeach
          @endif
        </tbody>
      </table><br><br>
</div>
@endsection