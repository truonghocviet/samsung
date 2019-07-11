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
            <th>Tên khách</th>
            <th>Máy-IMEI</th>
            <th>Tình trạng</th>
            <th>Hạn trả</th>
            <th class="text-center">Xem</th>
            <th class="text-center">BC</th>
          </tr>
        </thead>
        <tbody>
            @foreach($ListOrder as $lo)
            <tr>
              <td>{{$lo->customer->name_customer}}</td>
              <td>{{$lo->product->product_type->name_type}} {{$lo->product->name_product}}-{{$lo->product->model_code_product}}-{{$lo->product->IMEI_product}}</td>
              <td>{{$lo->mobile_status}}</td>
              <td>{{$lo->product->return_date}}</td>
              <td class="text-center"><a href="javascript:open('{{asset('')}}admin/order/detailOrder/{{$lo->id}}', 'example', 'left=200px,width=990px,height=700')"><i class="mdi mdi-clipboard-text iconlist success"></i></a></td>
              <td class="text-center"><i class="mdi mdi-alert-outline iconlist danger"></i></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th>Tên khách</th>
            <th>Máy-IMEI</th>
            <th>Tình trạng</th>
            <th>Hạn trả</th>
            <th class="text-center">Xem</th>
            <th class="text-center">BC</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
@endsection