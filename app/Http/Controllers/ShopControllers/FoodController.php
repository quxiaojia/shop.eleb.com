<?php

namespace App\Http\Controllers\ShopControllers;

use App\ShopModels\Menu;
use App\ShopModels\MenuCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{
    //菜品
    public function index(Request $request){
       // dd($request->input());
        $category_id =$request->category_id;
        $price = $request->price;
        $menu =$request->menu;
        $foods = Menu::paginate(5);
        $foods_class=MenuCategory::all();


        //dd($dd);
        //思路
        if($request->category_id){
            $id =$request->category_id;
            if($request->menu&&$request->price > 1){
                //查询指定分类下的菜品与区间
                if($request->price == 2){
                    $foods=Menu::where([
                        ['category',$id],
                        ['goods_name','like','%'.$menu.'%'],
                    ])->whereBetween('goods_price',[0,20])->paginate(5);
                    $foods_class=MenuCategory::all();
                    return view('search.list',compact('foods','foods_class','price','category_id','menu'));
                }
                if($request->price == 3){
                    $foods=Menu::where([
                        ['category',$id],
                        ['goods_name','like','%'.$menu.'%'],
                    ])->whereBetween('goods_price',[20,50])->paginate(5);
                    $foods_class=MenuCategory::all();
                    return view('search.list',compact('foods','foods_class','price','category_id','menu'));
                }
                if($request->price == 4){
                    $foods= Menu::where([
                        ['category',$id],
                        ['goods_name','like','%'.$menu.'%'],
                    ])->whereBetween('goods_price',[50,100])->paginate(5);
                    $foods_class=MenuCategory::all();
                    return view('search.list',compact('foods','foods_class','price','category_id','menu'));
                }
                if($request->price == 5){
                    $foods= Menu::where(
                        [
                            ['category',$id],
                            ['goods_name','like','%'.$menu.'%'],
                            ['goods_price','>',100],
                        ]
                    )->paginate(5);
                    $foods_class=MenuCategory::all();
                    return view('search.list',compact('foods','foods_class','price','category_id','menu'));
                }
                return '指定分类下的菜品与区间';
            }
            if($request->menu&&$request->price == 1){
                //指定分类下的菜品
                $foods= Menu::where(
                    [
                        ['category',$id],
                        ['goods_name','like','%'.$menu.'%'],
                    ]
                )->paginate(5);
                $foods_class=MenuCategory::all();
                return view('search.list',compact('foods','foods_class','price','category_id','menu'));
               // return '指定分类下的菜品';
            }
            if(!$request->menu&&$request->price > 1){
                if($request->price == 2){
                    $foods= Menu::where('category',$id)->whereBetween('goods_price',[0,20])->paginate(5);
                    $foods_class=MenuCategory::all();
                    return view('search.list',compact('foods','foods_class','price','category_id','menu'));
                }
                if($request->price == 3){
                    $foods= Menu::where('category',$id)->whereBetween('goods_price',[20,50])->paginate(5);
                    $foods_class=MenuCategory::all();
                    return view('search.list',compact('foods','foods_class','price','category_id','menu'));
                }
                if($request->price == 4){
                    $foods= Menu::where('category',$id)->whereBetween('goods_price',[50,100])->paginate(5);
                    $foods_class=MenuCategory::all();
                    return view('search.list',compact('foods','foods_class','price','category_id','menu'));
                }
                if($request->price == 5){
                    $foods= Menu::where(
                        [
                            ['category',$id],
                            ['goods_price','>',100],
                        ]
                    )->paginate(5);
                    $foods_class=MenuCategory::all();
                    return view('search.list',compact('foods','foods_class','price','category_id','menu'));
                }
                return '指定分类下的区间';
            }
            if($request->price == 1&&!$request->menu){

                $foods = Menu::where('category',$id)->paginate(5);
                $foods_class=MenuCategory::all();
                return view('search.list',compact('foods','foods_class','price','category_id','menu'));
                //return '指定分类下的全部';
            }

        }
        if(!$request->category_id&&$request->menu&&$request->price > 1){
            //查询全部的类下的菜品跟区间

            if($request->price == 2){
                //return 2;
                $foods= Menu::where( 'goods_name','like','%'.$menu.'%')->whereBetween('goods_price',[0,20])->paginate(5);
               $foods_class=MenuCategory::all();
                return view('search.list',compact('foods','foods_class','price','category_id','menu'));
            }
            if($request->price == 3){
                //return 2;
                $foods= Menu::where( 'goods_name','like','%'.$menu.'%')->whereBetween('goods_price',[20,50])->paginate(5);
                $foods_class=MenuCategory::all();
                return view('search.list',compact('foods','foods_class','price','category_id','menu'));
            }
            if($request->price == 4){
                //return 2;
                $foods= Menu::where( 'goods_name','like','%'.$menu.'%')->whereBetween('goods_price',[50,100])->paginate(5);
                $foods_class=MenuCategory::all();
                return view('search.list',compact('foods','foods_class','price','category_id','menu'));
            }
            if($request->price == 5){
                //return 2;
                $foods= Menu::where(
                   [
                       ['goods_name','like','%'.$menu.'%'],
                       ['goods_price','>',100],
                   ] )->paginate(5);
               $foods_class=MenuCategory::all();
                return view('search.list',compact('foods','foods_class','price','category_id','menu'));
            }

            //return '全部的类下的区间跟菜品';
        }
        if(!$request->category_id&&$request->menu&&$request->price == 1){
            //查询全部的类下的菜品

            $foods= Menu::where('goods_name','like','%'.$menu.'%')->paginate(5);
            $foods_class=MenuCategory::all();
            return view('search.list',compact('foods','foods_class','price','category_id','menu'));
           // return '全部的类下的菜品';
        }

        if(!$request->category_id&&!$request->menu&&$request->price > 1){
            //查询全部的价格区间

            if($request->price == 2){
                //return 2;
                $foods= Menu::whereBetween('goods_price',[0,20])->paginate(5);
                $foods_class=MenuCategory::all();
                return view('search.list',compact('foods','foods_class','price','category_id','menu'));
            }
            if($request->price == 3){
                //return 2;
                $foods= Menu::whereBetween('goods_price',[20,50])->paginate(5);
                $foods_class=MenuCategory::all();
                return view('search.list',compact('foods','foods_class','price','category_id','menu'));
            }
            if($request->price == 4){
                //return 2;
                $foods= Menu::whereBetween('goods_price',[50,100])->paginate(5);
                $foods_class=MenuCategory::all();
                return view('search.list',compact('foods','foods_class','price','category_id','menu'));
            }
            if($request->price == 5){
                //return 2;
                $foods= Menu::where('goods_price','>',100)->paginate(5);
                $foods_class=MenuCategory::all();
                return view('search.list',compact('foods','foods_class','price','category_id','menu'));
            }

        }

        if(!$request->menu&&$request->price == 1&&!$request->category_id){

            session()->flash('success','全部菜品');
            return redirect()->route('food.index');
        }

        return view('food.list',compact('foods','foods_class'));
    }
    //新增菜品
    public function create(){
        $foods_class=MenuCategory::all();
        return view('food.add',compact('foods_class'));
    }

    public function store(Request $request){
        //所属商家
        $food_class_id = $request->category_id;
        $date = MenuCategory::where('id',$food_class_id)->first();
        $shop_id = $date->shop_id;
        //月销量
        $month_sales = rand();
        //评分数量
        $rating_count = rand();
        //满意度数量
        $satisfy_count = rand();
        //满意度评分
        $satisfy_rate = rand(1,5);
        //评分
        $rating = rand(1,10);
        //dd($satisfy_rate);
        //dd($request->input());

        //dd($path);
        $path = '';
        if($request->file()){
            $path = $request->file('goods_img')->store('public/food_img');
            //修改保存路径
            $path = str_replace('public','http://shop.eleb.com/storage',$path);
        }
        Menu::create(
            [
                'goods_name'=>$request->goods_name,
                'rating'=>$rating,
                'shop_id'=>$shop_id,
                'category'=>$request->category_id,
                'goods_price'=>$request->goods_price,
                'description'=>$request->description,
                'month_sales'=>$month_sales,
                'rating_count'=>$rating_count,
                'tips'=>$request->tips,
                'satisfy_count'=>$satisfy_count,
                'satisfy_rate'=>$satisfy_rate,
                'status'=>$request->status,
                'goods_img'=>$path,
            ]
        );

        return '添加成功';
    }
    public function edit(Menu $food){
       // dd($food);
        $foods_class=MenuCategory::all();
        return view('food.edit',compact('food','foods_class'));
    }
    public function update(Menu $food,Request $request){
       // dd($request->file());
        if($request->file()){
            //return 1;
            $path = $request->file('goods_img')->store('public/food_img');
            //修改保存路径
            //dd($path);
            $path = str_replace('public','http://shop.eleb.com/storage',$path);
            $food->update(
                [
                    'goods_name'=>$request->goods_name,
                    'goods_price'=>$request->goods_price,
                    'tips'=>$request->tips,
                    'status'=>$request->status,
                    'category_id'=>$request->category_id,
                    'description'=>$request->description,
                    'goods_img'=>$path,
                ]
            );
            session()->flash('success','修改成功');
            return redirect()->route('food.index');
        }else{
            $food->update(
                [
                    'goods_name'=>$request->goods_name,
                    'goods_price'=>$request->goods_price,
                    'tips'=>$request->tips,
                    'status'=>$request->status,
                    'category_id'=>$request->category_id,
                    'description'=>$request->description,
                ]
            );
            session()->flash('success','修改成功');
            return redirect()->route('food.index');
        }


    }
    //删除
    public function destroy(Menu $food){

        $food->delete();
        session()->flash('success','删除成功');
        return redirect()->route('food.index');
    }

    //搜索
    public function search(Request $request){
       // return 1;
        $dd =$request->category_id;
        //dd($dd);
      //思路
        if($request->category_id){
            $id =$request->category_id;
            if($request->menu&&$request->price > 1){
                //查询指定分类下的菜品与区间
                return '指定分类下的菜品与区间';
            }
            if($request->menu&&$request->price == 1){
                return '指定分类下的菜品';
            }
            if(!$request->menu&&$request->price > 1){
                return '指定分类下的区间';
            }
            if($request->price == 1&&!$request->menu){
                $foods = Menu::where('category',$id)->paginate(5);
               // dd($foods);
                //$foods = Menu::paginate(5);
                $foods_class=MenuCategory::all();
                $price = $request->price;
                return view('food.list',compact('foods','foods_class','price','dd'));
                return '指定分类下的全部';
            }

        }
        if(!$request->category_id&&$request->menu&&$request->price > 1){
            //查询全部的类下的菜品
            return '全部的类下的区间跟菜品';
        }
        if(!$request->category_id&&$request->menu&&$request->price == 1){
            //查询全部的类下的菜品
            return '全部的类下的菜品';
        }

        if(!$request->category_id&&!$request->menu&&$request->price > 1){
            //查询全部的价格区间
            return '全部的价格区间';
        }

        if(!$request->menu&&$request->price == 1&&!$request->category_id){

            session()->flash('success','全部菜品');
            return redirect()->route('food.index');
        }
        //分类列表为空
    }

}