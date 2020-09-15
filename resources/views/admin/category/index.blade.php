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
          <th style="width: 250px">Tên danh mục</th>
          <th>Slug</th>
          <th>Loại danh mục</th>
          <th>Danh mục lớn</th>
          <th style="width: 90px">Trạng thái</th>
          <th style="width: 90px"></th>
        </thead>
        <tbody>
          @if (!is_null($large_category_product))
            @foreach ($large_category_product as $item)
                <tr>
                    <td>{{ $item->large_category_name }}</td>  
                    <td>{{ $item->slug_name }}</td>
                    <td>Danh mục lớn</td>
                    <td>Không có</td>
                    <td>
                        @if ($item->status==1)
                            <span style="color: green">Hiển thị</span>
                        @else
                            <span style="color: red">Không Hiển thị</span>
                        @endif
                    </td>
                    <td style="display: flex;width: 70px">
                        <a class="button" href="">Sửa</a>
                        <a class="button" href="">Xóa</a>
                    </td>
                </tr>
            @endforeach
          @endif
          @if (!is_null($small_category_product))
            @foreach ($small_category_product as $item)
                <tr>
                    <td>{{ $item->small_category_name }}</td>  
                    <td>{{ $item->slug_name }}</td>
                    <td>Danh mục nhỏ</td>
                    <td>{{ $item->large_category_product->large_category_name }}</td>
                    <td>
                        @if ($item->status==1)
                            <span style="color: green">Hiển thị</span>
                        @else
                            <span style="color: red">Không Hiển thị</span>
                        @endif
                    </td>
                    <td style="display: flex;width: 70px">
                        <a class="button" href="">Sửa</a>
                        <a class="button" href="">Xóa</a>
                    </td>
                </tr>
            @endforeach
          @endif
        </tbody>
      </table>
</div>
@endsection