@extends('admin.layout.index')
@section('content')

<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">SỬA THÔNG TIN USER</h4>
      @if(count($errors)>0)
      <div class="alert alert-danger">
        @foreach($errors->all() as $err)
        {{$err}}<br>
        @endforeach
      </div>
      @endif
      @if(session('thongbao'))
      <div class="alert alert-success">
        {{session('thongbao')}}
      </div>
      @endif
      <form class="forms-sample" action="{{asset('')}}admin/user/editUser/{{$User->id}}" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
          <label for="txtNameUser">Họ và tên <span class="required">*</span></label>
          <input type="text" class="form-control" id="txtNameUser" placeholder="Họ và tên" name='txtNameUser' value="{{$User->name_user}}">
        </div>
        <div class="form-group">
          <label >Số điện thoại <span class="required">*</span></label>
          <input type="number" class="form-control" placeholder="Số điện thoại" name='txtPhoneUser' value="{{$User->phone_user}}">
        </div>
        <div class="form-group">
          <label for="txtDescription">Mô tả</label>
          <textarea class="form-control" id="txtDescription" rows="3" placeholder="Mô tả" name='txtDescription'>{{$User->description_user}}</textarea>
        </div>
         <div class="form-group">
          <label for="txtUsername">Tên đăng nhập <span class="required">*</span></label>
          <input type="text" class="form-control" id="txtUsername" placeholder="Tên đặn nhập" name='txtUsername' value="{{$User->username}}">
        </div>
        
        <div class="form-group">
          <label for="numberRate">Rate <span class="required">*</span></label>
          <input type="number" class="form-control" id="numberRate" placeholder="Dánh giá từ 0 đến 100" name='numberRate'value="{{$User->rate_user}}">
        </div>
        <label>Vai Trò <span class="required">*</span></label>
        <div class="row">
          @foreach($GroupUser as $gr)
          <div class="col-sm-3">
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input"  name='id_group_user' value='{{$gr->id}}' @if($gr->id==$User->id_group_user) checked="checked" @endif>
                {{$gr->name_group}}
                <i class="input-helper"></i></label>
              </div>
            </div>
            @endforeach
          </div>
          <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
          <button type="reset" class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>

  @endsection