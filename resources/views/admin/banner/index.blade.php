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
    <h3>Quản lí banner</h3>
</div>
<div>
    <table>
        <thead>
          <th>Tiêu đề</th>
          <th>Thông tin</th>
          <th>Loại banner</th>
          <th></th>
        </thead>
        <tbody>
          @if (!is_null($banners))
            @foreach ($banners as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->infor }}</td>
                    <td>
                        @if ($item->type == 1)
                            Banner lớn
                        @else
                            Banner nhỏ
                        @endif
                    </td>
                    <td style="display: flex">
                        <a class="button" href="{{ route('admin.editbanner', ['id'=>$item->id]) }}">Sửa</a>
                    </td>
                </tr>
            @endforeach
          @endif
        </tbody>
      </table>
</div>
@endsection