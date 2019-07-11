@extends('admin.layout.index')
@section('content')

<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">THÊM VAI TRÒ</h4>
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
      <form class="forms-sample" action="{{asset('')}}admin/group/addGroup" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
          <label for="exampleInputUsername1">Tên vai trò <span class="required">*</span></label>
          <input type="text" class="form-control" id="exampleInputUsername1" placeholder="tên vai trò 3 đến 50 ký tự" name='txtNameGroup'>
        </div>
        <div class="form-group">
          <label for="exampleTextarea1">Mô tả</label>
          <textarea class="form-control" id="exampleTextarea1" rows="3" placeholder="mô tả" name='txtDescription'></textarea>
        </div>
        <label for="exampleTextarea1">Các quyền <span class="required">*</span></label>
        <div class="row">
          @foreach($Functions as $fs)
          <div class="col-sm-3">
            <div class="form-check form-check-success">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input"  name='code_function[]' value='{{$fs->code_function}}'>
                {{$fs->name_function}}
                <i class="input-helper"></i></label>
              </div>
            </div>
            @endforeach
          </div>
          <button type="submit" class="btn btn-gradient-success mr-2">Submit</button>
          <button type="reset" class="btn btn-gradient-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>

  @endsection