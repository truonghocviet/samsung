<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\customer;
use App\product;
use App\product_type;
use App\error;

class OrderController extends Controller
{

  public function getDetail($id)
  {
    $Error = error::find($id);
    return view('admin.order.detail',['Error' => $Error]);
  }

  public function getEdit($id)
  {
    $Error = error::find($id);
    $ProductType = product_type::all();
    $Users = User::all();
    return view('admin.order.edit',['Error' => $Error, 'ProductType' => $ProductType, 'Users' => $Users]);
  }

  public function getAdd()
  {
    $ProductType = product_type::all();
    $Users = User::all();
    foreach ($Users as $key => $User) {
      $CodeGroup = json_decode($User->group_user->code_group,true);
      $num = 0;
      foreach ($CodeGroup as $Code) {if($Code == 'receive_return_mobile'){$num=1;}}
      if($num == 1){$tempUser[] = $Users[$key];}
    }
    $Users = $tempUser;
    return view('admin.order.add',['ProductType' => $ProductType, 'Users' => $Users]);
  }
  public function postAdd(Request $request)
  {
   $this->validate($request,[
    'txtCustomerName'=> 'required|min:3|max:50',
    'txtMobileStatus'=> 'required',
    'txtRepairDescription'=> 'required',
    'manufacturer_id'=> 'required',
    'select_trangthai'=> 'required',
    'txtMobileName'=> 'required',
    'assigUser' => 'required',
    'txtReceiveDate' => 'required',
    'txtReturnDate' => 'required',
    'numChiPhiSuaChua'=> 'required|numeric',
    'numChiPhiPhuKien' => 'numeric'
  ],[
    'txtCustomerName.required'=>'Bạn chưa nhập tên khách hàng',
    'txtCustomerName.min'=>'Tên khách hàng có độ dài từ 3 đến 50 ký tự',
    'txtCustomerName.max'=>'Tên khách hàng có độ dài từ 3 đến 50 ký tự',
    'txtMobileStatus.required' => 'Bạn chưa nhập Mô tả hư hỏng',
    'txtRepairDescription.required' => 'Bạn chưa nhập Mô tả sửa chữa',
    'manufacturer_id.required' => 'Bạn chưa chọn Loại sản phẩm',
    'select_trangthai.required' => 'Bạn chưa chọn Trạng thái sản phẩm',
    'assigUser.required' => 'Bạn chưa chọn Người sửa',
    'txtMobileName.required' => 'Bạn chưa nhập Tên sản phẩm',
    'numChiPhiSuaChua.required' => 'Bạn chưa nhập Tổng chỉ phí',
    'numChiPhiSuaChua.numeric' => 'Tổng chi phí phải là kiểu số',
    'txtCustomerMobile.numeric' => 'Số Điện thoại khách hàng phải là kiểu số',
    'numChiPhiPhuKien.numeric' => 'Chí phí thay phụ kiện phải là kiểu số',
    'txtReceiveDate.required' => 'Ngày nhận không được để trống',
    'txtReturnDate.required' => 'Ngày trả không được để trống',

  ]);

   $Customer = new customer;
   $Customer->name_customer = $request->txtCustomerName;
   if(!empty($request->txtCustomerAddress)){$Customer->address_customer = $request->txtCustomerAddress;}
   if(!empty($request->txtCustomerMobile)){$Customer->phone_customer = $request->txtCustomerMobile;}
   if(!empty($request->txtCustomerTime)){$Customer->customer_time = $request->txtCustomerTime;}
   $Customer->save();
   $idCustomer = $Customer->id;

   $Product = new product;
   $Product->id_product_type = $request->manufacturer_id;
   $Product->id_group_status = $request->select_trangthai;
   $Product->name_product = $request->txtMobileName;
   if(!empty($request->txtKieumay)){$Product->model_code_product = $request->txtKieumay;}
   if(!empty($request->txtSomay)){$Product->number_product = $request->txtSomay;}
   if(!empty($request->txtMobileIMEI)){$Product->IMEI_product = $request->txtMobileIMEI;}
   if(!empty($request->txtAttachment)){$Product->attachment_product = $request->txtAttachment;}
   if(!empty($request->txtNgayMua)){$Product->purchase_date = $request->txtNgayMua;}else{$Product->purchase_date = '0000-00-00';}
   if(!empty($request->ckbFromCompany)){$Product->company = $request->ckbFromCompany;}
   if(!empty($request->ckThanhToan)){$Product->pay = $request->ckThanhToan;}
   if(!empty($request->ckBaoHanh)){$Product->guarantee = $request->ckBaoHanh;}
   if(!empty($request->txtequipment)){$Product->equipment = $request->txtequipment;}
   $Product->received_date = $request->txtReceiveDate;
   if(!empty($request->txtReturnDate)){$Product->return_date = $request->txtReturnDate;}else{$Product->return_date = '0000-00-00';}
   $Product->save();
   $idProduct = $Product->id;

   $Error = new error;
   $Error->id_customer = $idCustomer;
   $Error->id_product = $idProduct;
   $Error->id_user = $request->assigUser;
   $Error->mobile_status = $request->txtMobileStatus;
   $Error->repair_description = $request->txtRepairDescription;
   $Error->repair_cost = $request->numChiPhiSuaChua;
   $Error->components_cost = $request->numChiPhiPhuKien;
   $Error->save();

   return redirect('admin/order/addOrder')->with('thongbao','Thêm thành công');
 }
 public function getList()
 {
  $ListOrder = error::all();
  return view('admin.order.list',['ListOrder' => $ListOrder]);
}
}
