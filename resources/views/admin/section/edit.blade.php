@extends('admin.layout.master')
<style>
    input{
        width: 400px;
        height: 30px;
    }
    label{
        color: red;
        margin: 15px 0px;
    }
</style>
@section('content')
<div class="page-title">
    <h3>Sửa chi nhánh</h3>
</div>
<div>
    <form method="POST" action="{{ route('admin.posteditsection') }}">
        @csrf
        <input type="text" style="display: none" name="id" value="{{ $section->id }}">
        <label for="">Tên</label>
        <input style="width: 400px;height: 30px;" type="text" name="name" value="{{ $section->name }}">
        <label for="">Loại</label>
        <div style="display: flex">
            @if ($section->type==1)
                <span class="sp">Danh mục</span><input checked style="width: 15px;height: 15px;margin-left: 10px;margin-top: 5px" class="radio" type="radio"  name="type" value="1">
                <div style="margin-left: 100px"></div>
                <span class="sp">Phổ biến</span><input style="width: 15px;height: 15px;margin-left: 10px;margin-top: 5px" class="radio" type="radio"  name="type" value="2">
            @else
                <span class="sp">Danh mục</span><input style="width: 15px;height: 15px;margin-left: 10px;margin-top: 5px" class="radio" type="radio"  name="type" value="1">
                <div style="margin-left: 100px"></div>
                <span class="sp">Phổ biến</span><input checked style="width: 15px;height: 15px;margin-left: 10px;margin-top: 5px" class="radio" type="radio"  name="type" value="2">    
            @endif
        </div>
        <div>
            <label for="">Chọn sản phẩm thêm vào</label>
            @if (!is_null($products))
                @foreach ($products as $item)
                    @php
                        $check = 0;     
                    @endphp
                    @foreach ($section->section_content as $it)
                        @if ($it->id_product == $item->id)
                            @php
                                $check=1;
                            @endphp
                        @endif
                    @endforeach
                    @if ($check==1)
                        <div style="display: flex">
                            <input checked name="product[]" style="width: 15px;height: 15px;margin-top: 5px" value="{{ $item->id }}" class="check" type="checkbox">
                            <span style="margin-left: 10px;color: black" class="sp">{{ $item->product_name }}</span>
                        </div>
                    @else
                        <div style="display: flex">
                            <input name="product[]" style="width: 15px;height: 15px;margin-top: 5px" value="{{ $item->id }}" class="check" type="checkbox">
                            <span style="margin-left: 10px;color: black" class="sp">{{ $item->product_name }}</span>
                        </div>   
                    @endif
                @endforeach
            @endif
        </div>
        <br><br>
        <button style="margin-bottom: 50px;width: 400px;background: #3598dc"><span style="color: black">Sửa</span></button>
    </form>
</div>
@endsection