@extends('admin.layout.master')
@section('content')
    <div class="page-title">
        <h3>Nhập hàng</h3>
    </div>
    <form style="margin-left: 50px" action="{{ route('admin.postimport_goods') }}" method="POST">
        <div class="row">
            @csrf
            <label for="">Chọn sản phẩm</label>
            <select style="width: 650px;" name="id_product" id="">
                <option value="">Chọn sản phẩm</option>
                @foreach ($data_product as $item)
                    <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->product_name }}</option>
                @endforeach
            </select>
            <div style="margin-top: 20px;display: flex">
                <label style="margin-right: 10px;margin-top: 10px" for="">Giá: </label>
                <input style="width: 120px;margin-right: 80px;" type="text" name="price" placeholder="Nhập giá">
                <label style="margin-right: 10px;margin-top: 10px" for="">Số lượng: </label>
                <input style="width: 120px;margin-right: 85px;" type="text" name="quantity" placeholder="Nhập số lượng">
                <label style="margin-right: 10px;margin-top: 10px" for="">Size: </label>
                <select style="width: 100px;" name="size" id="">
                    <option value="">Chọn size</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="X">XL</option>
                    <option value="XXL">XXL</option>
                    <option value="XXXL">XXXL</option>
                </select>
            </div>
        </div>
        <input style="margin-top: 20px;margin-left: 250px;width: 100px;background: #3598dc;color: black" type="submit" class="submit" value="Thêm">
    </form>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        // body...
        $('.submit').click(function () {
            // body...
            var add = '<br/><hr/><div class="ok"><label for="">Chọn sản phẩm</label><select style="width: 650px;" name="id_product" id=""><option value="">Chọn sản phẩm</option>@foreach ($data_product as $item)<option value="{{ $item->id }}">{{ $item->id }} - {{ $item->product_name }}</option>@endforeach</select><div style="margin-top: 20px;display: flex"><label style="margin-right: 10px;margin-top: 10px" for="">Giá: </label><input style="width: 120px;margin-right: 80px;" type="text" name="price" placeholder="Nhập giá"><label style="margin-right: 10px;margin-top: 10px" for="">Số lượng: </label><input style="width: 120px;margin-right: 85px;" type="text" name="quantity" placeholder="Nhập số lượng"><label style="margin-right: 10px;margin-top: 10px" for="">Size: </label><select style="width: 100px;" name="size" id=""><option value="">Chọn size</option><option value="S">S</option><option value="M">M</option><option value="L">L</option><option value="X">XL</option><option value="XXL">XXL</option><option value="XXXL">XXXL</option></select></div></div>'
            $(".row").append(add);
            event.preventDefault();
        })
    })
</script>