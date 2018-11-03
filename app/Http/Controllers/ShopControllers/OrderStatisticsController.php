<?php

namespace App\Http\Controllers\ShopControllers;

use App\ShopModels\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderStatisticsController extends Controller
{
    //统计
    //日
    public function day(){
       /* $date = date('y-m-d h:i:s');
        dd($date);*/
        $date = date('y-m-d');
        $bb = date('y-m-d',strtotime('+1 day'));
        $aa = date('y-m-d',strtotime('-6 day'));
        //echo $date;die;
        //dd($bb);

       $orders =  Order::whereDate('created_at','<',$bb)->whereDate('created_at','>',$aa)->where('status',3)->get();
        $count = count($orders);
       $data =[];
        foreach($orders as $order){
            $data[] =$order;
        }
        dd($data);
      /*  return view('statistics.day');*/
    }
}
