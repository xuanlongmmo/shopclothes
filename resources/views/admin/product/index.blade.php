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
<a style="width: 200px;margin-bottom: 20px;margin-left: 850px" class="button2" href="{{ route('admin.addproduct') }}"><i class="fa fa-plus" aria-hidden="true"></i> Thêm sản phẩm mới</a>
<div>
    <table>
        <thead>
          <th style="width: 150px">Tên sản phẩm</th>
          <th style="width: 50px">Giá</th>
          <th style="width: 10px">Sale</th>
          <th>Danh mục</th>
          <th>Người tạo</th>
          <th>Trạng thái</th>
          <th style="width: 70px">Ngày tạo</th>
          <th style="width: 60px"></th>
        </thead>
        <tbody>
          @if (!is_null($list_product))
            @foreach ($list_product as $item)
                <tr>
                    <td style="color: green">{{ $item->product_name }}</td>
                    <td>{{ number_format($item->price) }} đ</td>
                    <td>{{ $item->sale_percent }}%</td>
                    <td>{{ $item->get_large_category->category_name }}</td>
                    <td><span style="color: red">{{ $item->user->username }}</span></td>
                    <td>
                        @if ($item->status==1)
                            Hiển thị
                        @else
                            <span style="color: red">Không hiển thị</span>
                        @endif
                    </td>
                    {{--  <td>{{ $item->created_at->format('M d Y') }}</td>  --}}
                    <td>15-9-2020</td>
                    <td style="display: flex">
                        <a class="button" href="{{ route('admin.editproduct', ['id'=>$item->id]) }}">Sửa</a>
                        <a class="button" href="{{ route('admin.deleteproduct', ['id'=>$item->id]) }}">Xóa</a>
                    </td>
                </tr>
            @endforeach
          @endif
        </tbody>
      </table>
</div>
@endsection