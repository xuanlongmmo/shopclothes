@extends('frontend.layout.master')
@section('content') 
<section id="aa-error">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-error-area">
            <h2>404</h2>
            <span style="color: red">Sorry! Page Not Found</span>
            <a href="{{ route('frontend.index') }}">Trang chủ</a>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection