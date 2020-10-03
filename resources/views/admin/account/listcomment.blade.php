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
    <h3>Quản lí comment</h3>
</div>
<div>
    <table>
        <thead>
          <th style="width: 130px">Họ tên</th>
          {{--  <th style="width: 80px">Ảnh</th>  --}}
          <th style="width: 100px">Email</th>
          <th style="width: 220px">Bài viết</th>
          <th style="width: 190px">Nội dung</th>
          <th style="width: 70px">Ngày tạo</th>
          <th style="width: 30px"></th>
        </thead>
        <tbody>
          @if (!is_null($listcomment))
            @foreach ($listcomment as $item)
                <tr>
                    <td>{{ $item->fullname }}</td>  
                    {{--  <td>
                        <div class="preview"> 
                            <img width="60px" height="60px" src="{{ $item->image }}" /> 
                        </div>
                    </td>  --}}
                    <td>{{ $item->email }}</td>
                    <td>alo</td>
                    <td>{{ $item->content }}</td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    <td style="width: 30px;display: flex">
                        <a class="button" href="{{ route('admin.deletecomment', ['id'=>$item->id]) }}">Xóa</a>
                    </td>
                </tr>
            @endforeach
          @endif
        </tbody>
      </table><br><br>
</div>
@endsection