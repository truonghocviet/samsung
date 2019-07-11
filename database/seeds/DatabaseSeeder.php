<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

     DB::table('group_user')->insert([
      'name_group' => 'Admin',
      'description_group' =>'Quản trị chung, có tất cả các quyền',
      'code_group'=> '["assign","search_repairinfo","receive_return_mobile","manufacturer_management","user_management","view_salary_report","delete_request_repair","view_salary_detail","move_not_repair_mobile","view_not_repair_mobile_report","manage_cashier"]'
    ]);

     DB::table('group_user')->insert([
      'name_group' => 'Kinh Doanh',
      'description_group' =>' Quản lý việc nhận trả máy cho khách',
      'code_group'=> '["assign","receive_return_mobile","manufacturer_management"]'
    ]);

     DB::table('group_user')->insert([
      'name_group' => 'Phan Công',
      'description_group' =>'Phân việc cho thợ sửa chữa',
      'code_group'=> '["assign","receive_return_mobile","manufacturer_management","move_not_repair_mobile","view_not_repair_mobile_report"]'
    ]);

     DB::table('group_user')->insert([
      'name_group' => 'Lễ Tân',
      'description_group' =>'Tạo phiếu sửa chữa',
      'code_group'=> '["assign","search_repairinfo","receive_return_mobile","manufacturer_management","move_not_repair_mobile","view_not_repair_mobile_report"]'
    ]);

     DB::table('group_user')->insert([
      'name_group' => 'Thợ Sửa Chữa',
      'description_group' =>'Người sửa máy',
      'code_group'=> '["assign","receive_return_mobile"]'
    ]);

     DB::table('group_user')->insert([
      'name_group' => 'Thu Ngân',
      'description_group' =>'Thống kê thu ngân',
      'code_group'=> '["search_repairinfo","receive_return_mobile","manage_cashier"]'
    ]);
      DB::table('group_user')->insert([
      'name_group' => 'Xem phiếu thu',
      'description_group' =>'Chỉ được xem phiếu thu',
      'code_group'=> '["search_repairinfo","receive_return_mobile","manage_cashier"]'
    ]);
     DB::table('functions')->insert(['name_function' => 'Phân công sửa điện thoại', 'code_function'=> 'assign']);
     DB::table('functions')->insert(['name_function' => 'Tìm kiếm thông tin sửa chữa', 'code_function'=> 'search_repairinfo']);
     DB::table('functions')->insert(['name_function' => 'Nhận và trả điện thoại', 'code_function'=> 'receive_return_mobile']);
     DB::table('functions')->insert(['name_function' => 'Quản lý thông tin hãng', 'code_function'=> 'manufacturer_management']);
     DB::table('functions')->insert(['name_function' => 'Quản lý người dùng', 'code_function'=> 'user_management']);
     DB::table('functions')->insert(['name_function' => 'Xem bảng lương nhân viên', 'code_function'=> 'view_salary_report']);
     DB::table('functions')->insert(['name_function' => 'Xóa bản ghi sửa chữa', 'code_function'=> 'delete_request_repair']);
     DB::table('functions')->insert(['name_function' => 'Xem thông tin chi tiết của bảng lương', 'code_function'=> 'view_salary_detail']);
     DB::table('functions')->insert(['name_function' => 'Chuyển điện thoại không sửa được', 'code_function'=> 'move_not_repair_mobile',]);
     DB::table('functions')->insert(['name_function' => 'Xem báo cáo điện thoại không sửa được', 'code_function'=> 'view_not_repair_mobile_report']);
     DB::table('functions')->insert(['name_function' => 'Quản lý thu ngân', 'code_function'=> 'manage_cashier']);

     DB::table('users')->insert([
       'name_user' => 'Lê Hoàng Phi',
       'phone_user'=> '0372073673',
       'username'=>'philhps02210',
       'password'=> bcrypt('123'),
       'rate_user'=>100,
       'id_group_user'=>1,
       'description_user'=>'',
       'remember_token'=>''
     ]);

     DB::table('product_type')->insert(['tyni_name' => 'MI', 'name_type'=> 'MÁY IN']);
     DB::table('product_type')->insert(['tyni_name' => 'AV', 'name_type'=> 'TI VI']);
     DB::table('product_type')->insert(['tyni_name' => 'WG', 'name_type'=> 'ĐIỀU HÒA - MÁY GIẶT']);
     DB::table('product_type')->insert(['tyni_name' => 'DAN', 'name_type'=>'DÀN ÂM THANH ']);
     DB::table('product_type')->insert(['tyni_name' => 'MA', 'name_type'=> 'MÁY ẢNH']);
     DB::table('product_type')->insert(['tyni_name' => 'DVD', 'name_type'=> 'DAU DVD']);
     DB::table('product_type')->insert(['tyni_name' => 'MC', 'name_type'=> 'MÁY CHIẾU']);
     DB::table('product_type')->insert(['tyni_name' => 'ĐTD', 'name_type'=> 'ĐIỆN THOẠI DI ĐỘNG']);
     DB::table('product_type')->insert(['tyni_name' => 'MHB', 'name_type'=> 'MÁY HÚT BỤI']);
     DB::table('product_type')->insert(['tyni_name' => 'LVS', 'name_type'=> 'LO VI SONG']);

     DB::table('group_status')->insert(['name_status' => 'Chờ kích hoặt bảo hành']);
     DB::table('group_status')->insert(['name_status' => 'Bảo hành']);
     DB::table('group_status')->insert(['name_status' => 'Bảo hành lại']);
     DB::table('group_status')->insert(['name_status' => 'Dịch vụ']);
     
   }
 }
