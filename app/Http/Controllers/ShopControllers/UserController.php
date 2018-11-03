<?php

namespace App\Http\Controllers\ShopControllers;
use App\ShopModels\Shop;
use App\ShopModels\ShopCategorie;
use App\ShopModels\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    //列表
    public function index(){
        $classifieds = ShopCategorie::all();
        //dd($classifieds);
        return view('user.register',compact('classifieds'));
    }

    //新增
    public function create(){
        $classifieds = ShopCategorie::all();
        //dd($classifieds);
        return view('user.register',compact('classifieds'));

    }

    public function store(Request $request){
        //dd($request->input());
        //表单验证
        //上传图片
        $path = '';
        if($request->file()){
            $path = $request->file('shop_img')->store('public/shop_img');

            //修改保存路径
            $path = str_replace('public','http://shop.eleb.com/storage',$path);

        }
        //保存数据到数据库
        $shop_data = Shop::create(
            [
                'shop_name' => $request->shop_name,
                'shop_category_id' => $request->shop_category_id,
                'discount' => $request->discount,
                'brand' => $request->brand,
                'on_time' => $request->on_time,
                'fengniao' => $request->fengniao,
                'bao' => $request->bao,
                'piao' => $request->piao,
                'zhun' => $request->zhun,
                'start_send' => $request->start_send,
                'send_cost' => $request->send_cost,
                'notice' => $request->notice,
                'status' => $request->status,
                'shop_img' => $path,
            ]
        );


        /*  $shop_id = DB::select("SELECT `id` FROM shops ORDER BY id DESC LIMIT 1;");
          $shop_id = $shop_id[0]->id;*/


        $shop_id = $shop_data->id;
       // dd($shop_id);

        //密码加密
        $password = bcrypt($request->password);
        User::create(
            [
                'name' => $request->name,
                'password' =>$password,
                'shop_id' => $shop_id,
                'email' => $request->email,
                'remember_token'=> $request->remember_token,
                'status' => 1
            ]
        );

        //return redirect()->route('business.index');
        return '添加成功';

    }


    //修改
    public function edit(){

    }

    public function update(){

    }

    //删除
    public function destroy(){

    }

    //查看
    public function show(){

    }
}
