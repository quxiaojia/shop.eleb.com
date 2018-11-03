<?php

namespace App\Http\Controllers\ShopControllers;

use App\ShopModels\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{

    //活动列表
    public function index(){
        //当前时间
        $now_date = date('Y-m-d');
        $datas =Activity::whereDate('end_time','>',$now_date)->paginate(5);
        return view('activity.list',compact('datas'));
    }
    public function show(Activity $data){
       // return 2;
    //dd($date->id);
        return view('activity.edit',compact('data'));
    }

}
