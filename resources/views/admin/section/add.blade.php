@extends('admin.layout.master')
<style>
    label{
        color: red;
        margin: 10px 0px;
    }
    span.sp{
        font-size: 15px;
    }
</style>
@section('content')
<div class="page-title">
    <h3>Thêm Section</h3>
</div>
<div>
    <form method="POST" action="{{ route('admin.postaddsection') }}">
        @csrf
        <label for="">Tên</label>
        <input style="width: 400px;height: 30px;" type="text" name="name">
        <label for="">Loại</label>
        <div style="display: flex">
            <span class="sp">Danh mục</span><input style="margin-left: 10px;margin-top: 5px" class="radio" type="radio"  name="type" value="1">
            <div style="margin-left: 100px"></div>
            <span class="sp">Phổ biến</span><input style="margin-left: 10px;margin-top: 5px" class="radio" type="radio"  name="type" value="2">
        </div>
        <div>
            <label for="">Chọn sản phẩm thêm vào</label>
            @if (!is_null($products))
                @foreach ($products as $item)
                    <div style="display: flex">
                        <input name="product[]" style="width: 15px;height: 15px;margin-top: 5px" value="{{ $item->id }}" class="check" type="checkbox">
                        <span style="margin-left: 10px;color: black" class="sp">{{ $item->product_name }}</span>
                    </div>
                @endforeach
            @endif
        </div>
        <br><br>
        <button style="margin-bottom: 50px;width: 400px;background: #3598dc"><span style="color: black">Thêm</span></button>
    </form>
</div>
@endsection