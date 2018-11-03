<?php

namespace App\Http\Controllers\ShopControllers;

use App\ShopModels\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //订单
    //查看订单
    public function index(){
       $orders = Order::paginate(5);
        //dd($orders);
        return view('order.list',compact('orders'));
    }
    public function show(){

    }
}
