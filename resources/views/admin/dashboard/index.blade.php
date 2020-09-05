@extends('admin.layout.master')
@section('content')
<div class="page-title">
    <h3>Dashboard </h3>
  </div>
  <div id="container">
    <div class="row 2col">
      <div class="col-md-3 col-sm-6 spacing-bottom-sm spacing-bottom">
        <div class="tiles blue added-margin">
          <div class="tiles-body">
            <div class="tiles-title">TÀI KHOẢN MỚI THÁNG NÀY </div>
            <div class="heading"> <span class="animate-number" data-value="26.8" data-animation-duration="1200">0</span>% </div>
            <div class="progress transparent progress-small no-radius">
              <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="26.8%"></div>
            </div>
            <div class="description"><i class="icon-custom-up"></i><span class="text-white mini-description ">&nbsp; 4% higher <span class="blend">than last month</span></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 spacing-bottom-sm spacing-bottom">
        <div class="tiles green added-margin">
          <div class="tiles-body">
            <div class="tiles-title">LƯU LƯỢNG TRUY CẬP</div>
            <div class="heading"> <span class="animate-number" data-value="2545665" data-animation-duration="1000">0</span> </div>
            <div class="progress transparent progress-small no-radius">
              <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="79%"></div>
            </div>
            <div class="description"><i class="icon-custom-up"></i><span class="text-white mini-description ">&nbsp; 2% higher <span class="blend">than last month</span></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 spacing-bottom">
        <div class="tiles red added-margin">
          <div class="tiles-body">
            <div class="tiles-title"> TỔNG TIỀN THÁNG NÀY </div>
            <div class="heading">  <span class="animate-number" data-value="14500000" data-animation-duration="1200">0</span> VNĐ </div>
            <div class="progress transparent progress-white progress-small no-radius">
              <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="45%"></div>
            </div>
            <div class="description"><i class="icon-custom-up"></i><span class="text-white mini-description ">&nbsp; 5% higher <span class="blend">than last month</span></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="tiles purple added-margin">
          <div class="tiles-body">
            <div class="tiles-title"> TỔNG ĐƠN HÀNG THÁNG NÀY</div>
            <div class="row-fluid">
              <div class="heading"> <span class="animate-number" data-value="1600" data-animation-duration="700">0</span> </div>
              <div class="progress transparent progress-white progress-small no-radius">
                <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="80%"></div>
              </div>
            </div>
            <div class="description"><i class="icon-custom-up"></i><span class="text-white mini-description ">&nbsp; 3% higher <span class="blend">than last month</span></span>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection