@extends('frontend.layout.master')
@section('content') 
<div style="width: 500px;padding-top: 200px;margin: 0px 400px;margin-bottom: 80px">
    <div class="modal-body">
        @if (!empty($success))
            <h1>{{$success}}</h1>
        @endif
    </div> 
</div>
@endsection