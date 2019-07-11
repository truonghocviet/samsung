<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\group_user;
use App\functions;

class GroupUserController extends Controller
{
 	public function getList()
 	{
 		$GroupUser = group_user::all();
 		return view('admin.group_user.list',['GroupUser' => $GroupUser]);
 	}

 	public function getAdd()
 	{
 		$Functions = functions::all();
 		return view('admin.group_user.add',['Functions'=>$Functions]);
 	}

 	public function postAdd(Request $request)
 	{
 		$this->validate($request,[
    		'txtNameGroup'=> 'required|min:3|max:50',
    		'code_function'=> 'required',
    	],[
    		'txtNameGroup.required'=>'bạn chưa nhập tên vai trò',
    		'txtNameGroup.min'=>'Tên vai trò có độ dài từ 3 đến 50 ký tự',
    		'txtNameGroup.max'=>'Tên vai trò có độ dài từ 3 đến 50 ký tự',
    		'code_function.required'=>'bạn chưa chọn quyền',
    	]);
    	$GroupUser = new group_user;
    	$GroupUser->name_group = $request->txtNameGroup;
    	$GroupUser->description_group = $request->txtDescription;
    	$GroupUser->code_group = json_encode($request->code_function);
    	$GroupUser->save();

    	return redirect('admin/group/addGroup')->with('thongbao','Thêm thành công');
 	}

 	public function getEdit($id)
 	{
 		$Functions = functions::all();
 		$GroupUser = group_user::find($id);
 		$GroupUser->code_group = json_decode($GroupUser->code_group,true);

 		return view('admin.group_user.edit', ['GroupUser'=>$GroupUser, 'Functions'=>$Functions]);
 	}

 	public function postEdit(Request $request, $id)
 	{
 		$GroupUser = group_user::find($id);

 		$this->validate($request,[
    		'txtNameGroup'=> 'required|min:3|max:50',
    		'code_function'=> 'required',
    	],[
    		'txtNameGroup.required'=>'bạn chưa nhập tên vai trò',
    		'txtNameGroup.min'=>'Tên vai trò có độ dài từ 3 đến 50 ký tự',
    		'txtNameGroup.max'=>'Tên vai trò có độ dài từ 3 đến 50 ký tự',
    		'code_function.required'=>'bạn chưa chọn quyền',
    	]);
    	
    	$GroupUser->name_group = $request->txtNameGroup;
    	$GroupUser->description_group = $request->txtDescription;
    	$GroupUser->code_group = json_encode($request->code_function);
    	$GroupUser->save();

    	return redirect('admin/group/editGroup/'.$id)->with('thongbao','Sửa thành công');
 	}

 	public function getDelete($id)
 	{
 		$GroupUser = group_user::find($id);
 		$GroupUser->delete();

    	return redirect('admin/group/listGroup')->with('thongbao','Xóa thành công');

 	}
}
