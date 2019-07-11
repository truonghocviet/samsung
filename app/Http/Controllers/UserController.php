<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\group_user;


class UserController extends Controller
{
    //
    public function getLoginAdmin()
    {
    	return view('login');
    }

    public function postLoginAdmin(Request $request)
    {
    	$this->validate($request,[
    		'username'=> 'required',
    		'password'=> 'required'
    	],[
    		'username.required'=>'Bạn chưa nhập username',
    		'password.required'=>'Bạn chưa nhập password'
    	]);
    	if(Auth::attempt([
    		'username'=>$request->username,
    		'password'=>$request->password
    	]))
    	{
            $User = Auth::user();
            $User->remember_token = $request->_token;
            $User->save();
            return redirect('admin/order/listOrder');
        }
        else
        {
            return redirect('Login')->with('thongbao','Sai Username hoặc Password');

        }
    }

    public function getLogoutAdmin()
    {
        Auth::logout();
        return redirect('Login');
    }

    public function getList()
    {
        $Users = User::all();
        return view('admin.user.list',['Users' => $Users]);
    }

    public function getAdd()
    {
        $GroupUser = group_user::all();
        return view('admin.user.add',['GroupUser'=>$GroupUser]);
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,[
            'txtNameUser'=> 'required',
            'txtUsername'=>'required',
            'txtPhoneUser'=>'required',
            'numberRate'=>'required',
            'Password'=>'required',
            'Password_confirm'=>'required|same:Password',
            'id_group_user'=>'required',
            'numberRate'=>'min:0|max:100',
        ],[
            'txtNameUser.required'=>'bạn chưa nhập họ tên',
            'txtPhoneUser.required'=>'bạn chưa nhập số điện thoại',
            'txtUsername.required'=>'bạn chưa nhập Username',
            'numberRate.required'=>'bạn chưa nhập Rate',
            'Password.required'=>'bạn chưa nhập Password',
            'Password_confirm.required'=>'bạn chưa nhập Password xát nhận',
            'Password_confirm.same'=>'Nhập lại Password không chính xát',
            'id_group_user.required'=>'bạn chưa chọn vai trò',
            'numberRate.min'=> 'Rate phải từ 0 đến 100',
        ]);
        $User = new User;
        $User->name_user = $request->txtNameUser;
        $User->phone_user = $request->txtPhoneUser;
        $User->username = $request->txtUsername;
        $User->password = bcrypt($request->Password);
        $User->rate_user = $request->numberRate;
        $User->description_user = $request->txtDescription;
        $User->id_group_user = $request->id_group_user;
        $User->save();

        return redirect('admin/user/addUser')->with('thongbao','Thêm thành công');
    }

    public function getEdit($id)
    {
        $GroupUser = group_user::all();
        $User = User::find($id);

        return view('admin.user.edit',['GroupUser'=>$GroupUser,'User'=>$User]);
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request,[
            'txtNameUser'=> 'required',
            'txtUsername'=>'required',
            'txtPhoneUser'=>'required',
            'id_group_user'=>'required',
            'numberRate'=>'min:0|max:100',
        ],[
            'txtNameUser.required'=>'bạn chưa nhập họ tên',
            'txtPhoneUser.required'=>'bạn chưa nhập số điện thoại',
            'txtUsername.required'=>'bạn chưa nhập Username',
            'id_group_user.required'=>'bạn chưa chọn vai trò',
            'numberRate.min'=> 'Rate phải từ 0 đến 100',
        ]);
        $User = User::find($id);
        $User->name_user = $request->txtNameUser;
        $User->phone_user = $request->txtPhoneUser;
        $User->username = $request->txtUsername;
        $User->rate_user = $request->numberRate;
        $User->description_user = $request->txtDescription;
        $User->id_group_user = $request->id_group_user;
        $User->save();

        return redirect('admin/user/editUser/'.$id)->with('thongbao','Sửa thành công');

    }
}


