@extends('admin.layout.index')
@section('content')
<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">DANH SÁCH VAI TRÒ</h4>
      @if(session('thongbao'))
      <div class="alert alert-success">
        {{session('thongbao')}}
      </div>
      @endif
      <table id="DataTable" class="display table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>id</th>
            <th>Tên vai trò</th>
            <th>Ghi chú</th>
            <th class="text-center">Sửa</th>
          </tr>
        </thead>
        <tbody>
          @foreach($GroupUser as $Group)
          <tr>
            <td>{{$Group->id}}</td>
            <td>{{$Group->name_group}}</td>
            <td>{{$Group->description_group}}</td>
            <td class="text-center">
              <a href="{{asset('')}}admin/group/editGroup/{{$Group->id}}"><i class="mdi mdi-pen iconlist success"></i></a>
            </td>
          </tr>
          @endforeach
          
        </tbody>
        <tfoot>
          <tr>
            <th>id</th>
            <th>Tên vai trò</th>
            <th>Ghi chú</th>
            <th class="text-center">Sửa</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
@endsection