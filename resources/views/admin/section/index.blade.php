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
    <a style="width: 200px;margin-bottom: 20px;margin-left: 850px" class="button2" href="{{ route('admin.addsection') }}"><i class="fa fa-plus" aria-hidden="true"></i> Thêm section</a>
    <table>
        <thead>
          <th>Id</th>
          <th>Tên</th>
          <th>Loại</th>
          <th></th>
        </thead>
        <tbody>
          @if (!is_null($sections))
            @foreach ($sections as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        @if ($item->type==1)
                            Danh mục
                        @else
                            Phổ biến
                        @endif
                    </td>
                    <td style="display: flex;width: 50px;">
                        <a class="button" href="{{ route('admin.editsection', ['id'=>$item->id]) }}">Sửa</a>
                        <a class="button" href="{{ route('admin.deletesection', ['id'=>$item->id]) }}">Xóa</a>
                    </td>
                </tr>
            @endforeach
          @endif
        </tbody>
      </table>
</div>
@endsection