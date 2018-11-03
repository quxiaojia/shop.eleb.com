<?php

namespace App\Http\Controllers\ShopControllers;

use App\ShopModels\Menu;
use App\ShopModels\MenuCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FoodClassificationController extends Controller
{
    //菜品分类
    public function index(){
       $foods_class= MenuCategory::paginate(5);
        return view('FoodClassification.list',compact('foods_class'));
    }
    //添加菜品分类
    public function create(){
        return view('FoodClassification.add');
    }
    public function store(Request $request){
        //判断是否登录用户
        if(!$shop_id = auth()->user()){
            session()->flash('success','请登录后再操作');
            return redirect()->route('login');
        }
        //获取商铺id
        $shop_id = auth()->user()->shop_id;
       // 97~122是小写的英文字母65~90是大写的
        $letter = chr(rand(65, 90));
        $type_accumulation =  $letter.mt_rand().mt_rand();


        //如果选择默认则查询是否有默认
        if($request->is_selected == 1){
            $is_selected = MenuCategory::where('is_selected',1)->first();
            if($is_selected){
                session()->flash('success','只能有一个默认菜品');
                return redirect()->route('food_classification.index');
            }
        }
        MenuCategory::create(
            [
                'name'=>$request->name,
                'is_selected'=>$request->is_selected,
                'description'=>$request->description,
                'shop_id'=>$shop_id,
                'type_accumulation'=>$type_accumulation,
            ]
        );
        return redirect()->route('food_classification.index');
    }
    //修改
    public function edit(MenuCategory $food_classification){
        return view('FoodClassification.edit',compact('food_classification'));
    }
    public function update(MenuCategory $food_classification,Request $request){
        //dd($request->input());
        //dd($food_classification);
        //判断是否登录用户
        if(!$shop_id = auth()->user()){
            session()->flash('success','请登录后再操作');
            return redirect()->route('login');
        }
        //如果选择默认则查询是否有默认
        if($request->is_selected == 1){
            $is_selected = MenuCategory::where('is_selected',1)->first();
            if($is_selected){
                session()->flash('success','只能有一个默认菜品');
                return redirect()->route('food_classification.index');
            }
        }
        $food_classification->update(
            [
                'name'=>$request->name,
                'is_selected'=>$request->is_selected,
                'description'=>$request->description,
             ]
        );
        session()->flash('success','修改菜品分类成功');
        return redirect()->route('food_classification.index');
    }
    //删除
    public function destroy(MenuCategory $food_classification){
        //dd($food_classification);
        $id = $food_classification->id;
        $res = Menu::where('category',$id)->first();
        if($res){
            session()->flash('success','该分类下有菜品，不能删除该分类');
            return redirect()->route('food_classification.index');
        }
        $food_classification->delete();
        session()->flash('success','删除成功');
        return redirect()->route('food_classification.index');
    }
}
