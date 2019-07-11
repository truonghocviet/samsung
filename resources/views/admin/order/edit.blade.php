@extends('admin.layout.index')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">CẬP NHẬT YÊU CẦU SỬA CHỮA SẢN PHẨM</h4>
			<p class="card-description">
				Số phiếu: <code>{{$Error->id}}</code>
			</p>
			<table class="table table-detail">
				
				<tr class="tr-detail">
					<td style="padding: 0">
						<table class="table">
							<tr class="tr-detail">
								<td style="border: none">
									<p class="card-description title-2">Thông tin khách hàng</p>
									<div class="form-group">
										<label>Khách hàng <span class="required">*</span></label>
										<input type="text" class="form-control" name="txtCustomerName" required="required" placeholder="Họ tên khách hàng">
									</div>
									<div class="form-group">
										<label>Địa chỉ</label>
										<input type="text" class="form-control"  name="txtCustomerAddress" placeholder="Địa chỉ">
									</div>
									<div class="form-group">
										<label >Điện thoại</label>
										<input type="number" class="form-control" name="txtCustomerMobile" placeholder="Điện thoại">
									</div>
									<input type="submit" name="" value="Submit" class="btn btn-success">
								</td>
							</tr>
							<tr >
								<td style="border: none">
									<p class="card-description title-2">Thông tin khách hàng</p>
									<div class="form-group">
										<label >Mô tả hư hỏng <span class="required">*</span></label>
										<textarea class="form-control" rows="3" placeholder="Mô tả hử hỏng" required="required" name="txtMobileStatus"></textarea>
									</div>
									<div class="form-group">
										<label >Mô tả sửa chữa <span class="required">*</span></label>
										<textarea class="form-control" rows="3" placeholder="Mô tả sửa chữa" required="required" name="txtRepairDescription"></textarea>
									</div>
									<input type="submit" name="" value="Submit" class="btn btn-success">

								</td>
							</tr>
						</table>
					</td>
					<td>
						<p class="card-description title-2">Thông tin sản phẩm</p>
						<div class="form-group">
							<label>Loại sản phẩm <span class="required">*</span></label>
							<select class="form-control" required="required" name="manufacturer_id">
								<option value="">-Loại sản phẩm-</option>
								@foreach($ProductType as $pt)
								<option value='{{$pt->id}}'>{{$pt->name_type}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Tên sản phẩm <span class="required">*</span></label>
							<input type="text" class="form-control" required="required" name="txtMobileName" placeholder="Tên sản phẩm">
						</div>

						<div class="form-group">
							<label>IMEI(Điện thoại)</label>
							<input type="text" class="form-control" name="txtMobileIMEI" placeholder="IMEI(Điện thoại)">
						</div>
						<div class="form-group">
							<label>Mã bào hành</label>
							<input type="text" class="form-control" name="txtequipment" placeholder="Thiết bị thay thế">
						</div>
						<div class="form-group">
							<label>Trạng thái <span class="required">*</span></label>
							<select class="form-control" required="required" name="select_trangthai">
								<option value="">-Trạng thái-</option>
								<option value="1">Chờ kích hoạt bảo hành</option>
								<option value="2">Bảo hành</option>
								<option value="3">Bảo hành lại</option>
								<option value="4">Dịch vụ</option>
							</select>
						</div>
						
						<div class="form-group">
							<label>Phân công <span class="required">*</span></label>
							<select class="form-control" name="assigUser">
								<option value="">-Người sửa-</option>
								@foreach($Users as $User)
								<option value='{{$User->id}}'>{{$User->name_user}}</option>
								@endforeach
							</select>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-check form-check-success">
									<label class="form-check-label">
										<input type="checkbox" class="form-check-input"  name="ckbFromCompany" value='1'>
										Hàng công ty
										<i class="input-helper"></i></label>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-check form-check-success">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input"  name='ckThanhToan' value='1'>
											Thanh toán
											<i class="input-helper"></i></label>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-check form-check-success">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input"  name='ckBaoHanh' value='1'>
												Kích hoạt bảo hành
												<i class="input-helper"></i></label>
											</div>
										</div>
									</div>
									<input type="submit" name="" value="Submit" class="btn btn-success">
								</td>
							</tr>
							<tr class="tr-detail">
								<td>
									<p class="card-description title-2">Thông tin nhận trả</p>
									<div class="form-group">
										<label>Ngày nhận <span class="required">*</span></label>
										<input type="date" class="form-control" name="txtReceiveDate" required="required" value="{{date('Y-m-d',time())}}">
									</div>
									<div class="form-group">
										<label>Ngày trả <span class="required">*</span></label>
										<input type="date" class="form-control" name="txtReturnDate" required="required">
									</div>
									<div class="form-group">
										<label>Người nhận</label>
										<input type="text" class="form-control" value="{{$UserLogin->name_user}}" disabled="disabled">
									</div>
									<input type="submit" name="" value="Submit" class="btn btn-success">
								</td>
								<td>
									<p class="card-description title-2">Thông tin chi phí</p>
									{{-- <div class="form-group">
										<label>Giảm giá <span class="required">*</span></label>
										<br>
										<input type="text" class="form-control" id="numChiPhi" required="required" name="numChiPhi" placeholder="Giảm giá" min="0" max="100" style="width: 50%; display: inline-block;" value="0"> %
									</div> --}}
									<div class="form-group">
										<label>Tổng chi phí <span class="required">*</span></label>
										<input type="text" class="form-control" id="numChiPhi" required="required" name="numChiPhi" placeholder="Tổng chi phí">
									</div>
									<div class="form-group">
										<label>Chi phí thay phụ kiện</label>
										<input type="text" class="form-control" id="numChiPhiPhuKien" name="numChiPhiPhuKien" placeholder="Chi phí thay phụ kiện" value="0">
									</div>
									<div class="form-group" id="numChiPhiSuaChua">
										<label>Chi phí sửa chữa</label>
										<input type="text" class="form-control" name="numChiPhiSuaChua" placeholder="Chi phí sửa chữa" disabled="disabled">
									</div>
									<input type="submit" name="" value="Submit" class="btn btn-success">
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			@endsection
			@section('script')
			<script>
				$(document).ready(function(){
					$('[name=numChiPhi]').maskNumber({integer: true});
					$('[name=numChiPhiPhuKien]').maskNumber({integer: true});
					$('[name=numChiPhiSuaChua]').maskNumber({integer: true});
					
					$('#numChiPhi').change(function(event) {
						var numChiPhiSuaChua = $('#numChiPhi').val() - $('#numChiPhiPhuKien').val();
						$.get('../../ajax/getChiPhiSuaChua/'+numChiPhiSuaChua,function(data) {
							$('#numChiPhiSuaChua').html(data);
						});
					});
					$('#numChiPhiPhuKien').change(function(event) {
						var numChiPhiSuaChua = $('#numChiPhi').val() - $('#numChiPhiPhuKien').val();
						$.get('../../ajax/getChiPhiSuaChua/'+numChiPhiSuaChua,function(data) {
							$('#numChiPhiSuaChua').html(data);
						});
					});
				});
			</script>
			@endsection