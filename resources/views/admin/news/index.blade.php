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
    <h3>Danh sách tin</h3>
</div>
<a style="width: 200px;margin-bottom: 20px;margin-left: 850px" class="button2" href="{{ route('admin.addnews') }}"><i class="fa fa-plus" aria-hidden="true"></i> Thêm tin mới</a>
<div>
    <table>
        <thead>
          <th>ID</th>
          <th style="width: 200px">Tiêu đề</th>
          <th>Danh mục</th>
          <th>Người tạo</th>
          <th>Ngày tạo</th>
          <th style="width: 60px"></th>
        </thead>
        <tbody>
          @if (!is_null($list_news))
            @foreach ($list_news as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td style="width: 450px">{{ $item->title }}</td>
                    <td>{{ $item->category->category_name }}</td>
                    <td>{{ $item->user->username }}</td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    <td style="display: flex">
                        <a class="button" href="{{ route('admin.editnews', ['id'=>$item->id]) }}">Sửa</a>
                        <a class="button" href="{{ route('admin.deletenews', ['id'=>$item->id]) }}">Xóa</a>
                    </td>
                </tr>
            @endforeach
          @endif
        </tbody>
      </table>
</div>
{{--  @section('js')
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>
        function deletenews(e){
            var id_news = e.value;
            $.ajax({
                
            });
        }
    </script>
@endsection  --}}
@endsection