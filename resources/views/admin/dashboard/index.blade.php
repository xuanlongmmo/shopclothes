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
            <div class="heading"> <span class="animate-number" data-value="{{ $userthismonth }}" data-animation-duration="1200"></span> user </div>
            {{--  <div class="progress transparent progress-small no-radius">
              <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="26.8%"></div>
            </div>  --}}
            <div style="height: 15px"></div>
            @if ($userthismonth >= $userlastmonth && $userlastmonth != 0)
              <div class="description"><i class="icon-custom-up"></i><span class="text-white mini-description ">&nbsp; {{ ROUND((($userthismonth-$userlastmonth)/$userlastmonth)*100,1) }}% higher <span class="blend">than last month</span></span>
            @elseif ($userthismonth < $userlastmonth && $userlastmonth != 0)
              <div class="description"><i class="icon-custom-down"></i><span class="text-white mini-description ">&nbsp; {{ ROUND((($userlastmonth-$userthismonth)/$userlastmonth)*100,1) }}% lower <span class="blend">than last month</span></span>
            @else
              <div class="description"><i class="icon-custom-up"></i><span class="text-white mini-description ">&nbsp; 100% higher <span class="blend">than last month</span></span>
            @endif
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
            <div class="heading">  <span class="animate-number" data-value="{{ number_format($totalpaythismonth) }}" data-animation-duration="1200"></span> VNĐ </div>
            <div class="progress transparent progress-white progress-small no-radius">
              @if ($totalpaythismonth > $totalpaylastmonth)
                @if ($totalpaylastmonth == 0)
                  <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="100%"></div>
                @else
                  @if ($totalpaythismonth / $totalpaylastmonth >=1)
                    <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="100%"></div>
                  @else
                    <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="{{ (($totalpaythismonth-$totalpaylastmonth)/$totalpaylastmonth)*100 }}%"></div>
                  @endif
                @endif
              @else
                <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="0%"></div>
              @endif
            </div>
            @if ($totalpaythismonth >= $totalpaylastmonth && $totalpaylastmonth != 0)
              <div class="description"><i class="icon-custom-up"></i><span class="text-white mini-description ">&nbsp; {{ ROUND((($totalpaythismonth-$totalpaylastmonth)/$totalpaylastmonth)*100,1) }}% higher <span class="blend">than last month</span></span>
            @elseif ($totalpaythismonth < $totalpaylastmonth && $totalpaylastmonth != 0)
              <div class="description"><i class="icon-custom-down"></i><span class="text-white mini-description ">&nbsp; {{ ROUND((($totalpaylastmonth-$totalpaythismonth)/$totalpaylastmonth)*100,1) }}% lower <span class="blend">than last month</span></span>
            @else
              <div class="description"><i class="icon-custom-up"></i><span class="text-white mini-description ">&nbsp; 100% higher <span class="blend">than last month</span></span>    
            @endif
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="tiles purple added-margin">
          <div class="tiles-body">
            <div class="tiles-title"> TỔNG ĐƠN HÀNG THÁNG NÀY</div>
            <div class="row-fluid">
              <div class="heading"> <span class="animate-number" data-value="{{ $orderthismonth }}" data-animation-duration="700">0</span> </div>
              <div class="progress transparent progress-white progress-small no-radius">
                @if ($orderthismonth > $orderlastmonth)
                  @if ($orderlastmonth == 0)
                    <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="100%"></div> 
                  @else
                    @if ($orderthismonth / $orderlastmonth >=1)
                      <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="100%"></div>
                    @else
                      <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="{{ (($orderthismonth-$orderlastmonth)/$orderlastmonth)*100 }}%"></div>
                    @endif
                  @endif
                @else
                  <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="0%"></div>
                @endif
            </div>
            @if ($orderthismonth >= $orderlastmonth && $orderlastmonth != 0)
              <div class="description"><i class="icon-custom-up"></i><span class="text-white mini-description ">&nbsp; {{ ROUND((($orderthismonth-$orderlastmonth)/$orderlastmonth)*100,1) }}% higher <span class="blend">than last month</span></span>
            @elseif ($orderthismonth < $orderlastmonth && $orderlastmonth != 0)
              <div class="description"><i class="icon-custom-down"></i><span class="text-white mini-description ">&nbsp; {{ ROUND((($orderlastmonth-$orderthismonth)/$orderlastmonth)*100,1) }}% lower <span class="blend">than last month</span></span>
            @else
              <div class="description"><i class="icon-custom-up"></i><span class="text-white mini-description ">&nbsp; 100% higher <span class="blend">than last month</span></span>
            @endif
            </div>
          </div>
        </div>
      </div>
      <div style="margin-left: -730px;width: 950px;margin-top: 20px" id="char"></div>
      {{--  @foreach($year as $key=>$item)
        <input id="{{ $key }}" type="text" value="{{ $key }}">
        @foreach($item as $k=>$value)
          <input id="{{ $key }}{{ $k + 1 }}" type="text" value="{{ $value }}">
        @endforeach
        <br>------------------------------------------------
      @endforeach   --}}
      {{--  var obj = document.getElementById('201712').value;  --}}
    </div>
    <script src="{{ asset('code/highcharts.js') }}"></script>
    <script src="{{ asset('modules/series-label.js') }}"></script>
    <script src="{{ asset('modules/exporting.js') }}"></script>
    <script src="{{ asset('modules/export-data.js') }}"></script>
    <script src="{{ asset('modules/accessibility.js') }}"></script>
    <script type="text/javascript">
      {{--  var Arrayyear = new Array(<?php foreach($year as $key=>$item){ echo json_encode($key); }; ?>);
      alert(Arrayyear[1]);  --}}
      Highcharts.chart('char', {
        
          title: {
              text: 'Biểu đồ so sánh doanh thu giữa các năm'
          },

          yAxis: {
              title: {
                  text: 'Số tiền'
              }
          },

          xAxis: {
              accessibility: {
                  rangeDescription: 'Range: 2010 to 2017'
              }
          },

          legend: {
              layout: 'vertical',
              align: 'right',
              verticalAlign: 'middle'
          },

          plotOptions: {
              series: {
                  label: {
                      connectorAllowed: false
                  },
                  pointStart: 1
              }
          },

          series: [{
              name: '2019',
              data: [4393004, 5002503, 5700177, 6960058, 9700031, 11990031, 13710033, 15410075,9700031, 11990031, 13007133, 154175]
          }, {
              name: '2020',
              data: [2490016, 2400064, 2009742, 2900851, 3200490, 3000282, 3008121, 4000434, 3240090, 3020082, 3810021, 4040034]
          }],

          responsive: {
              rules: [{
                  condition: {
                      maxWidth: 500
                  },
                  chartOptions: {
                      legend: {
                          layout: 'horizontal',
                          align: 'center',
                          verticalAlign: 'bottom'
                      }
                  }
              }]
          }

      });
		</script>
@endsection
{{--  subtitle: {
              text: 'Source: thesolarfoundation.com'
          },  --}}