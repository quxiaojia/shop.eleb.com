<?php

namespace App\Http\Controllers\ShopControllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index(){
        return view('login.login');
    }
    public function route(Request $request){
       // dd($request->input());
        $this->validate($request,
            [
                'name'=>'required',
                'password'=>'required',
            ],
            [
                'name.required'=>'商户名不能为空',
                'password.required'=>'商户密码不能为空',
            ]
            );
        if($request->rpassword=== $request->password){
            if(Auth::attempt(['name'=>$request->name,'password'=>$request->password])){
                if(auth()->user()->status == 0){
                    session()->flash('success','该用户已被禁用');
                    return redirect()->route('login');
                };
                session()->flash('success','登录成功');
                return redirect()->route('user.index');
            }
            session()->flash('success','商户名不存在，或密码错误');
            return redirect()->route('login');
        }
        session()->flash('success','两次密码输入不一致');
        return redirect()->route('login');

    }

    //删除
    public function destroy(){
        Auth::logout();
        session()->flash('success','成功退出');
        return redirect()->route('login');
    }
}
