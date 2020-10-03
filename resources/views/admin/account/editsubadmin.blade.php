@extends('admin.layout.master')
<style>
    select.a{
        width: 400px;
        height: 30px;
    }
    input{
        width: 700px;
        height: 30px;
    }
    label{
        color: black;
        margin: 10px 0px;
    }
    input.check{
        width: 12px;
        height: 12px;
    }
</style>
@section('content')
<div class="page-title">
    <h3>Tạo tài khoản subadmin</h3>
</div>
<div style="width: 800px;margin: 0px 100px;">
    <div class="modal-body">
        <form method="POST" class="aa-login-form" action="{{ route('admin.posteditsubadmin') }}">
          @csrf
          <input type="text" style="display: none" value="{{ $user->id }}" name="id">
          <label for="">Tài khoản</label>
          <input readonly value="{{ $user->username }}" name="username" type="text" placeholder="Tài khoản">
          <span style="color: red">{{ $errors->first('username') }}</span><br>
          <label for="">Họ và Tên</label>
          <input readonly value="{{ $user->fullname }}" name="fullname" type="text" placeholder="Họ và Tên">
          <span style="color: red">{{ $errors->first('fullname') }}</span><br>
          <label for="">Email</label>
          <input readonly value="{{ $user->email }}" name="email" type="text" placeholder="Email">
          <span style="color: red">{{ $errors->first('email') }}</span><br>
          <label for="">Số điện thoại<span>*</span></label>
          <input readonly value="{{ $user->phone }}" name="phone" type="text" placeholder="Số điện thoại">
          <span style="color: red">{{ $errors->first('phone') }}</span><br>
          <label for="">Chọn quyền</label>
          @php
              $count = 0;
          @endphp
          <table>
          @foreach ($permissions as $item)
              @php
                $check = 0;
                $count = $count+1;
              @endphp
              @foreach ($user->permissions as $temp)
                    @if ($temp->id == $item->id)
                        @php
                            $check = 1;
                        @endphp
                    @endif
              @endforeach
                @if ($count == 1)
                    <tr>
                @endif
                @if ($check == 1)
                    <td><input checked class="check" value="{{ $item->id }}" type="checkbox" name="permissions[]">{{ $item->name }}</td>
                @else
                    <td><input class="check" value="{{ $item->id }}" type="checkbox" name="permissions[]">{{ $item->name }}</td>
                @endif
                @if ($count == 3)
                    </tr>
                    @php
                    $count = 0;
                    @endphp
                @endif
          @endforeach
          </table>
          <input style="width: 150px;margin-top: 10px;margin-left: 300px;background-color: chartreuse" type="submit" value="Lưu" >
          </div>
        </form>
    </div> 
</div>
@endsection