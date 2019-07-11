@extends('admin.layout.index')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">YÊU CẦU SỬA CHỮA SẢN PHẨM</h4>
			<p class="card-description">
				Số phiếu: <code>{{$Error->id}}</code>
			</p>
			<table class="table table-detail">
				
				<tr class="tr-detail">
					<td>
						<p class="card-description title-2">Thông tin khách hàng</p>
						<div class="row mb-2">
							<div class="col-sm-6"><b>Khách hàng</b></div>
							<div class="col-sm-6">{{$Error->customer->name_customer}}</div>
						</div>
						<hr>
						<div class="row mb-2">
							<div class="col-sm-6"><b>Địa chỉ</b></div>
							<div class="col-sm-6">{{$Error->customer->address_customer}}</div>
						</div>
						<hr>
						<div class="row mb-2">
							<div class="col-sm-6"><b>Điện thoại</b></div>
							<div class="col-sm-6">{{$Error->customer->phone_customer}}</div>
						</div>
						<hr>
						<div class="row mb-2">
							<div class="col-sm-6"><b>Số lần sửa</b></div>
							<div class="col-sm-6">
								@if(!empty($Error->customer->customer_time))
								{{$Error->customer->customer_time}}
								@endif
								0
							</div>
						</div>
					</td>
					<td>
						<p class="card-description title-2">Thông tin sản phẩm</p>
						<div class="row mb-2">
							<div class="col-sm-6"><b>Nhóm sản phẩm</b></div>
							<div class="col-sm-6">{{$Error->product->product_type->name_type}}</div>
						</div>
						<hr>
						<div class="row mb-2">
							<div class="col-sm-6"><b>Tên sản phẩm</b></div>
							<div class="col-sm-6">{{$Error->product->name_product}}</div>
						</div>
						<hr>
						<div class="row mb-2">
							<div class="col-sm-6"><b>Kiểu máy</b></div>
							<div class="col-sm-6">{{$Error->product->model_code_product}}</div>
						</div>
						<hr>
						<div class="row mb-2">
							<div class="col-sm-6"><b>Số máy</b></div>
							<div class="col-sm-6">{{$Error->product->number_product}}</div>
						</div>
						<hr>
						<div class="row mb-2">
							<div class="col-sm-6"><b>IMEI</b></div>
							<div class="col-sm-6">{{$Error->product->IMEI_product}}</div>
						</div>
						<hr>
						<div class="row mb-2">
							<div class="col-sm-6"><b>Số máy</b></div>
							<div class="col-sm-6">{{$Error->product->number_product}}</div>
						</div>
					</td>
				</tr>
				<tr class="tr-detail">
					<td>
						<p class="card-description title-2">Thông tin nhận trả</p>
						<div class="row mb-2">
							<div class="col-sm-6"><b>Ngày nhận</b></div>
							<div class="col-sm-6">{{date('d/m/Y',strtotime($Error->product->received_date))}}</div>
						</div>
						<hr>
						<div class="row mb-2">
							<div class="col-sm-6"><b>Ngày trả</b></div>
							<div class="col-sm-6">{{date('d/m/Y',strtotime($Error->product->return_date))}}</div>
						</div>
						<hr>
						<div class="row mb-2">
							<div class="col-sm-6"><b>Người nhận</b></div>
							<div class="col-sm-6">{{$Error->user->name_user}}</div>
						</div>
					</td>
					<td>
						<p class="card-description title-2">Thông tin chi phí</p>
						<div class="row mb-2">
							<div class="col-sm-6"><b>Tổng chi phí</b></div>
							<div class="col-sm-6">{{number_format($Error->total_cost)}} VNĐ</div>
						</div>
						<hr>
						<div class="row mb-2">
							<div class="col-sm-6"><b>Chi phí thay phụ kiện</b></div>
							<div class="col-sm-6">{{number_format($Error->components_cost)}} VNĐ</div>
						</div>
						<hr>
						<div class="row mb-2">
							<div class="col-sm-6"><b>Thành tiền(CPSC)</b></div>
							<div class="col-sm-6">{{number_format($Error->total_cost - $Error->components_cost)}} VNĐ</div>
						</div>
					</td>
				</tr>
			</table>
			<hr>
			<div class="row">
				<div class="col-sm-12 text-center">
					<a href="{{asset('')}}admin/order/editOrder/{{$Error->id}}" class="btn btn-info">Cập nhật</a>
					<a href="" class="btn btn-success">In giấy niên nhận</a>
					<a href="" class="btn btn-success">In phiếu thu</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection