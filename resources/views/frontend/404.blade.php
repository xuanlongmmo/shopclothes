@extends('frontend.layout.master')
@section('content') 
<section id="aa-error">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-error-area">
            <h2>404</h2>
            <span style="color: red">Xin lỗi bạn không có quyền vào mục này!!!!</span>
            <a href="{{ route('frontend.index') }}">Trang chủ</a>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection