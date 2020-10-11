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
    <h3>Quản lí danh mục</h3>
</div>
<a style="width: 200px;margin-bottom: 20px;margin-left: 850px" class="button2" href="{{ route('admin.adddiscount') }}"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mã giảm giá mới</a>
<div>
    <table>
        <thead>
          <th>ID</th>
          <th style="width: 70px">Mã</th>
          {{--  <th>Danh mục</th>
          <th>Sản phẩm</th>  --}}
          <th>Điều kiện</th>
          <th>HSD</th>
          <th style="width: 90px">Người tạo</th>
          <th style="width: 150px">Ngày tạo</th>
          <th style="width: 30px"></th>
        </thead>
        <tbody>
          @if (!is_null($datadiscount))
            @foreach ($datadiscount as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->code }}</td>  
                    {{--  <td></td>
                    <td></td>  --}}
                    <td>{{ number_format($item->condition) }} vnđ</td>
                    <td style="width: 150px">{{ $item->expired }}</td>
                    <td><span style="color: red">{{ $item->user->username }}</span></td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    <td style="display: flex;width: 30px">
                        <a class="button" href="{{ route('admin.deletecategory', ['id'=>$item->id]) }}">Xóa</a>
                    </td>
                </tr>
            @endforeach
          @endif
        </tbody>
      </table><br><br>
</div>
@endsection