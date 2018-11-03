<?php

namespace App\ShopModels;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $fillable = ['goods_name','rating','shop_id','category','goods_price','description','month_sales','rating_count','tips','satisfy_count','satisfy_rate','status','goods_img'];
    //模型关联
    public function foods_class(){
        return $this->belongsTo(MenuCategory::class,'category');
    }

    public function shops(){
        return $this->belongsTo(Shop::class,'shop_id');
    }
}
