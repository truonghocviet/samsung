@extends('admin.layout.index')
@section('content')
<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">DANH SÁCH USER</h4>
      @if(session('thongbao'))
      <div class="alert alert-success">
        {{session('thongbao')}}
      </div>
      @endif
      <table id="DataTable" class="display table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>id</th>
            <th>Họ Và Tên</th>
            <th>Số Điện Thoại</th>
            <th>Rate(%)</th>
            <th>Vai Trò</th>
            <th class="text-center">Sửa</th>
          </tr>
        </thead>
        <tbody>
          @foreach($Users as $User)
          <tr>
            <td>{{$User->id}}</td>
            <td>{{$User->name_user}}</td>
            <td>{{$User->phone_user}}</td>
            <td>{{$User->rate_user}}</td>
            <td>{{$User->group_user->name_group}}</td>
            <td class="text-center"><a href="{{asset('')}}admin/user/editUser/{{$User->id}}"><i class="mdi mdi-pen iconlist success"></i></a></td>
          </tr>
          @endforeach
          
        </tbody>
        <tfoot>
          <tr>
           <th>id</th>
            <th>Họ Và Tên</th>
            <th>Số Điện Thoại</th>
            <th>Rate(%)</th>
            <th>Vai Trò</th>
            <th class="text-center">Sửa</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
@endsection