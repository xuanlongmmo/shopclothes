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
    <h3>Quản lí chi nhánh</h3>
</div>
<div>
    <a style="width: 200px;margin-bottom: 20px;margin-left: 850px" class="button2" href="{{ route('admin.addbranch') }}"><i class="fa fa-plus" aria-hidden="true"></i> Thêm chi nhánh</a>
    <table>
        <thead>
          <th>Tên chi nhánh</th>
          <th>Địa chỉ</th>
          <th>Email</th>
          <th>Số điện thoại</th>
          <th></th>
        </thead>
        <tbody>
          @if (!is_null($branchs))
            @foreach ($branchs as $item)
                <tr>
                    <td>{{ $item->branch_name }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td style="display: flex">
                        <a class="button" href="{{ route('admin.editbranch', ['id'=>$item->id]) }}">Sửa</a>
                        <a class="button" href="{{ route('admin.deletebranch', ['id'=>$item->id]) }}">Xóa</a>
                    </td>
                </tr>
            @endforeach
          @endif
        </tbody>
      </table>
</div>
@endsection